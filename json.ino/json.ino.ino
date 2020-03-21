#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>

const char* ssid = "new_techno";
const char* password = "srsas12dfin";

void setup() 
{
  Serial.begin(115200);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) 
  {
    delay(1000);
    Serial.println("Connecting...");
  }
}

void loop() 
{
  if (WiFi.status() == WL_CONNECTED) 
  {
    HTTPClient http; //Object of class HTTPClient
    http.begin("http://192.168.0.102/pub-tech/json.php?id=1");
    int httpCode = http.GET();

    if (httpCode > 0) 
    {
      const size_t bufferSize = JSON_OBJECT_SIZE(2) + JSON_OBJECT_SIZE(3) + JSON_OBJECT_SIZE(5) + JSON_OBJECT_SIZE(8) + 370;
      DynamicJsonBuffer jsonBuffer(bufferSize);
      JsonObject& root = jsonBuffer.parseObject(http.getString());
 
      const char* f_name = root["f_name"];
      const char* email = root["email"]; 
      const char* first_medicine_name = root["first_medicine_name"];
      const char* first_medicine_time = root["first_medicine_time"];
      const char* second_medicine_name = root["second_medicine_name"];
      const char* second_medicine_time = root["second_medicine_time"];
      const char* third_medicine_name = root["third_medicine_name"];
      const char* third_medicine_time = root["third_medicine_time"];

      serial.print("Full Name:");
      serial.println(f_name);
      serial.print("Email");
      serial.println("email");
      serial.print("First Medicine Name:");
      serial.println(first_medicine_name);
      serial.print("First Medicine Time:");
      serial.println(first_medicine_time);
      serial.print("Second Medicine Name:");
      serial.println(second_medicine_name);
      serial.print("Second Medicine Time:");
      serial.println(second_medicine_time);
      serial.print("Third Medicine Name:");
      serial.println(third_medicine_name);
      serial.print("Third Medicine Time:");
      serial.println(third_medicine_time);

    }
    http.end(); //Close connection
  }
  delay(60000);
}
