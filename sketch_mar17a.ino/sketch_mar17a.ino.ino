#include <ESP8266WiFi.h>
#include <LiquidCrystal.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#include <time.h>
#include <NTPClient.h>
#include <WiFiUdp.h>
#include <string.h>


LiquidCrystal lcd(D2, D3, D5, D6, D7, D8);

const long utcOffsetInSeconds = 3600;
char daysOfTheWeek[7][12] = {"Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"};
const char* ssid = "new_techno";  //wifi ssid
const char* password = "srsas12dfin";   //wifi password

// Define NTP Client to get time
WiFiUDP ntpUDP;
NTPClient timeClient(ntpUDP, "bd.pool.ntp.org", utcOffsetInSeconds);

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
  timeClient.begin();
}

void loop() {
  timeClient.update();
  lcd.begin(16, 2);
  lcd.clear();
  lcd.setCursor(0, 0);
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http; //Object of class HTTPClient
    http.begin("http://192.168.0.102/pub-tech/json.php?id=2");
    int httpCode = http.GET();

    if (httpCode > 0) 
    {
      const size_t bufferSize = JSON_OBJECT_SIZE(2) + JSON_OBJECT_SIZE(3) + JSON_OBJECT_SIZE(5) + JSON_OBJECT_SIZE(8) + 370;
      DynamicJsonBuffer jsonBuffer(bufferSize);
      JsonObject& root = jsonBuffer.parseObject(http.getString());
 
      const char* f_name = root["f_name"];
      const char* bed_no = root["bed_no"]; 
      const char* first_medicine_name = root["first_medicine_name"];
      const char* first_medicine_time = root["first_medicine_time"];
      const char* second_medicine_name = root["second_medicine_name"];
      const char* second_medicine_time = root["second_medicine_time"];
      const char* third_medicine_name = root["third_medicine_name"];
      const char* third_medicine_time = root["third_medicine_time"];
      
      int hour = timeClient.getHours();
      hour = hour + 5;
      
      char *string1, *string2, *string3;
      string1 = strdup(first_medicine_time);
      string2 = strdup(second_medicine_time);
      string3 = strdup(third_medicine_time);
//      converting string to int
      int val1 = atoi(strsep(&string1, ":"));
      int val2 = atoi(strsep(&string2, ":"));
      int val3 = atoi(strsep(&string3, ":"));
      
//      making condition to print the name of the medicine
      if(val1 == hour && val2 != hour && val3 != hour){
//          Serial.println("It's time to take your breakfast buddy");
            lcd.println(first_medicine_name);
            lcd.println(first_medicine_time);
      }
      else if(val1 != hour && val2 == hour && val3 != hour){
//          Serial.println("It's time to take your lunch buddy");
            lcd.println(second_medicine_name);
            lcd.println(second_medicine_time);
      }
      else if(val1 != hour && val2 != hour && val3 == hour){
//          Serial.println("It's time to take your dinner buddy");
            lcd.println(third_medicine_name);
            lcd.println(third_medicine_time);
      }
      else{
          lcd.print("We will alert you for your medicine time to time!");
      }
    }
    http.end(); //Close connection
  }
  for (int positionCounter = 0; positionCounter < 29; positionCounter++) {
    lcd.scrollDisplayLeft();
    delay(1000);
  }
}
