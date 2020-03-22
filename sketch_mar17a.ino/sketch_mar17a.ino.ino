#include <ESP8266WiFi.h>
#include <LiquidCrystal.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
LiquidCrystal lcd(D2, D3, D5, D6, D7, D8);


const char* ssid = "new_techno";  //wifi ssid
const char* password = "srsas12dfin";   //wifi password

void setup() {
  Serial.begin(115200);
   lcd.begin(16, 2);
   lcd.clear();
   lcd.setCursor(0, 0);
   lcd.print("NEW ZEN TECH");
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  if (WiFi.waitForConnectResult() != WL_CONNECTED) {
    Serial.println("WiFi Failed!");
    return;
  }
  Serial.println(WiFi.localIP());
}

void loop() {
  lcd.begin(16, 2);
  lcd.clear();
  lcd.setCursor(0, 0);
  if (WiFi.status() == WL_CONNECTED) {
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

      // Serial.print("Full Name:");
      // lcd.println(f_name);
      // Serial.print("Email");
      // lcd.println(email);
      lcd.print(first_medicine_name);
      lcd.println(first_medicine_time);
      lcd.print(first_medicine_name);
      lcd.println(first_medicine_time);
      lcd.print(first_medicine_name);
      lcd.println(first_medicine_time);
    }
    http.end(); //Close connection
  }
  for (int positionCounter = 0; positionCounter < 29; positionCounter++) {
    lcd.scrollDisplayLeft();
    delay(1000);
  }
}
