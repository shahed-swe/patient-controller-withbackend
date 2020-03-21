#include <ESP8266WiFi.h>
#include <ESPAsyncTCP.h>
#include <ESPAsyncWebServer.h>
#include <LiquidCrystal.h>  
LiquidCrystal lcd(D2, D3, D5, D6, D7, D8);

AsyncWebServer server(80);

const char* ssid = "new_techno";  //wifi ssid
const char* password = "srsas12dfin";   //wifi password

const char* PARAM_INPUT_1 = "input1";
const char* PARAM_INPUT_2 = "input2";


const char index_html[] PROGMEM = R"rawliteral(
<!DOCTYPE HTML><html><head>
  <title>Smart Notice Board</title>
  <meta name="viewport" content="width=device-width, initial-scale=5">
<p> <font size="9" face="sans-serif"> <marquee> Smart Controler </marquee> </font> </p>
  </head><body><center>
  <form action="/get">
    Enter IP to Display: <input type="text" name="input1">
    Enter Time to Display: <input type="text" name="input2">
    <input type="submit" value="Send">
  </form><br>
</center></body></html>)rawliteral";

void notFound(AsyncWebServerRequest *request) {
  request->send(404, "text/plain", "Not found");
}

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
  Serial.println();
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());

  server.on("/", HTTP_GET, [](AsyncWebServerRequest *request){
    request->send_P(200, "text/html", index_html);
  });

  server.on("/get", HTTP_GET, [] (AsyncWebServerRequest *request) {
    String message1,message2;
    String inputParam;
    if (request->hasParam(PARAM_INPUT_1) && request->hasParam(PARAM_INPUT_2)) {
      message1 = request->getParam(PARAM_INPUT_1)->value();
      message2 = request->getParam(PARAM_INPUT_2)->value();
      inputParam = PARAM_INPUT_1;
       lcd.clear();
       lcd.setCursor(0,0);
       lcd.print(message1);
       lcd.print(message2);
    }
    else {
      message2 = "No message sent";
      message1 = "No message sent";
      inputParam = "none";
    }
    Serial.println(message1);
    Serial.println(message2);
   
  request->send(200, "text/html", index_html);
  });
  server.onNotFound(notFound);
  server.begin();
}

void loop() {
    for (int positionCounter = 0; positionCounter < 29; positionCounter++) {
    lcd.scrollDisplayLeft();
    delay(100);
  }
}
