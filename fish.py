import time
from machine import Pin, ADC, I2C
import ssd1306  # OLED library
import urequests  # Library for HTTP requests
import uasyncio as asyncio

# Pin setup
motor_pin1 = Pin(12, Pin.OUT)  # Relay 1
motor_pin2 = Pin(13, Pin.OUT)  # Relay 2
buzzer = Pin(16, Pin.OUT)      # Buzzer
led = Pin(0, Pin.OUT)          # LED
ph_sensor = ADC(Pin(26))       # pH sensor
turbidity_sensor = ADC(Pin(27)) # Turbidity sensor
ds18b20_sensor = ADC(Pin(28))  # Simulating DS18B20 temperature sensor as ADC

# OLED setup
i2c = I2C(0, scl=Pin(21), sda=Pin(20))
oled = ssd1306.SSD1306_I2C(128, 64, i2c)

# ThingSpeak API setup
THINGSPEAK_API_KEY = "YOUR_API_KEY"  # Replace with your ThingSpeak Write API Key
THINGSPEAK_URL = "https://api.thingspeak.com/update"

# Global sensor values
ph_value = 0
turbidity_ntu = 0
temperature_c = 0

# Helper function: Round to decimal places
def round_to_dp(value, decimal_place):
    multiplier = 10 ** decimal_place
    return round(value * multiplier) / multiplier

# Function to read pH sensor
def read_ph_sensor():
    global ph_value
    adc_val = ph_sensor.read_u16()
    voltage = (adc_val / 65535) * 3.3  # Convert ADC reading to voltage
    ph_value = -5.70 * voltage + 30.34  # Adjust calibration as needed
    return round(ph_value, 2)

# Function to read turbidity sensor
def read_turbidity_sensor():
    global turbidity_ntu
    adc_val = turbidity_sensor.read_u16()
    voltage = (adc_val / 65535) * 3.3  # Convert ADC reading to voltage
    turbidity_ntu = -1120.4 * voltage**2 + 5742.3 * voltage - 4353.8  # NTU calculation
    return round(turbidity_ntu, 2)

# Function to simulate temperature sensor
def read_temperature_sensor():
    global temperature_c
    adc_val = ds18b20_sensor.read_u16()
    voltage = (adc_val / 65535) * 3.3
    temperature_c = voltage * 100  # Simulate temperature based on voltage
    return round(temperature_c, 2)

# Function to display on OLED
def display_oled():
    oled.fill(0)
    oled.text(f"Turbidity: {turbidity_ntu} NTU", 0, 0)
    oled.text(f"pH: {ph_value}", 0, 10)
    oled.text(f"Temp: {temperature_c}C", 0, 20)
    oled.show()

# Function to send data to ThingSpeak
def send_data_to_thingspeak(ph, turbidity, temperature):
    try:
        response = urequests.get(
            f"{THINGSPEAK_URL}?api_key={THINGSPEAK_API_KEY}&field1={ph}&field2={turbidity}&field3={temperature}"
        )
        print("Data sent to ThingSpeak:", response.text)
        response.close()
    except Exception as e:
        print("Error sending data to ThingSpeak:", e)

# Motor control function
async def control_motor():
    while True:
        print("Motor forward...")
        motor_pin1.on()
        await asyncio.sleep(5)
        motor_pin1.off()
        await asyncio.sleep(2)
        print("Motor reverse...")
        motor_pin2.on()
        await asyncio.sleep(5)
        motor_pin2.off()
        await asyncio.sleep(10)

# Monitor sensors and send data to ThingSpeak
async def monitor_sensors():
    while True:
        ph = read_ph_sensor()
        turbidity = read_turbidity_sensor()
        temperature = read_temperature_sensor()
        send_data_to_thingspeak(ph, turbidity, temperature)
        display_oled()
        await asyncio.sleep(15)  # Send data every 15 seconds

# Main program
async def main():
    print("Starting fish monitoring system...")
    await asyncio.gather(control_motor(), monitor_sensors())

# Run the program
try:
    asyncio.run(main())
except KeyboardInterrupt:
    print("Program interrupted.")