#include <ArduinoJson.h>

// Wifi
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>

ESP8266WiFiMulti WiFiMulti;
#define USE_SERIAL Serial
WiFiClient client;
HTTPClient http;

//String urlGetData = "http://192.168.188.146/praktek8-rfid-with-arduino-json/index.php";
String respon;
String id;
// buzzer
#define pinBuzzer D0

// lcd
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);

// SDA ---------------> D2
// SCL ---------------> D1
// VCC ---------------> VIN
// GND ---------------> GND

// RFID
// SDA > D4/SDA
// SCK > D5/SCK
// MOSI> D7/MOSI
// MISO> D6/MISO
// IRQ> (kosong)
// RST> D3
// GND>GND
// 3.3V>Power nodemcu 8266 // pin rfid ke nodemcu

#include <SPI.h>
#include <MFRC522.h>
#define SS_PIN D4
#define RST_PIN D3 // library buat sensor rfid

MFRC522 mfrc522(SS_PIN, RST_PIN); // deklarasi RFID

String no_kartu = "", kartu_1 = "", kartu_2 = "";

// Timer variables
unsigned long lastTime = 0;
unsigned long timerDelay = 10000;

void setup() {
  WiFi.mode(WIFI_STA);
  Serial.begin(115200);
  
  WiFiMulti.addAP("POCO M5", "uwiw2000!"); // Sesuaikan SSID dan password ini

  pinMode(pinBuzzer, OUTPUT);
  digitalWrite(pinBuzzer, LOW);

  SPI.begin(); //
  mfrc522.PCD_Init();
  
  lcd.init();
  lcd.backlight();
  
  while ((WiFiMulti.run() != WL_CONNECTED))
  {
    Serial.println("Internet Not Connected");

    lcd.clear();
    lcd.setCursor(6, 0);
    lcd.print("WiFi");
    lcd.setCursor(2, 1);
    lcd.print("NOT CONNECTED");
      
    delay(1000);
  }

  Serial.println("Internet Connected");
  
  lcd.clear();
  lcd.setCursor(6, 0);
  lcd.print("WiFi");
  lcd.setCursor(2, 1);
  lcd.print("CONNECTED!!!");

//  getData();

  delay(1000);
}

void loop() {
  if ((millis() - lastTime) > timerDelay) {
    //getData();

    lcd.clear();
    lastTime = millis();
  }

  lcd.setCursor(0, 0);
  lcd.print("PEMBACAAN KARTU");
  if (!mfrc522.PICC_IsNewCardPresent())
  {
    return;
  }
  if (!mfrc522.PICC_ReadCardSerial())
  {
    return;
  }

  // Menampilkan UID TAG Di Serial Monitor
  Serial.print("No Kartu :");
  String content = "";
  
  for (byte i = 0; i < mfrc522.uid.size; i++)
  {
    Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
    Serial.print(mfrc522.uid.uidByte[i], HEX);
    content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
    content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }

  no_kartu = content.substring(1);
  no_kartu.toUpperCase();
//
  Serial.println();
  if(!(no_kartu == "")){
    id = no_kartu;
     sendData();
  }
  
//  
  lcd.setCursor(0, 1);
  lcd.println(no_kartu);
  
  Serial.println();

//  if (no_kartu == kartu_1) {
//    Serial.println("Kartu anda adalah Kartu 1");
//    
//    digitalWrite(pinBuzzer, HIGH);
//    delay(250);
//    digitalWrite(pinBuzzer, LOW);
//    delay(200);
//    digitalWrite(pinBuzzer, HIGH);
//    delay(250);
//    digitalWrite(pinBuzzer, LOW);
//  } else if (no_kartu == kartu_2) {
//    Serial.println("Kartu anda adalah Kartu 2");
//
//    digitalWrite(pinBuzzer, HIGH);
//    delay(250);
//    digitalWrite(pinBuzzer, LOW);
//    delay(200);
//    digitalWrite(pinBuzzer, HIGH);
//    delay(250);
//    digitalWrite(pinBuzzer, LOW);
//  } else {
//    Serial.println("Kartu anda tidak cocok");
//    
//    digitalWrite(pinBuzzer, HIGH);
//    delay(1000);
//    digitalWrite(pinBuzzer, LOW);
//    delay(300);
//    digitalWrite(pinBuzzer, HIGH);
//    delay(1000);
//    digitalWrite(pinBuzzer, LOW);
//  }

  Serial.println();

  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("PEMBACAAN KARTU");
  delay(1000);
}

//void getData() {
//  if ((WiFiMulti.run() == WL_CONNECTED))
//  {
//    USE_SERIAL.print("[HTTP] Memulai...\n");
//    
//    http.begin( client, urlGetData );
//    
//    USE_SERIAL.print("[HTTP] Ambil data di server ...\n");
//    int httpCode = http.GET();
//
//    if(httpCode > 0)
//    {
//      USE_SERIAL.printf("[HTTP] kode response GET : %d\n", httpCode);
//
//      if (httpCode == HTTP_CODE_OK) // code 200
//      {
//        respon = http.getString();
//
//        Serial.println();
//        Serial.println("Respon : " + respon);
//        Serial.println();
//
//        int str_len = respon.length() + 1;
//        char json[str_len];
//        
//        respon.toCharArray(json, str_len);
//
//        DynamicJsonDocument doc(1024);
//        deserializeJson(doc, json);
//
//        String krt_1 = doc["kartu_1"];
//        kartu_1 = krt_1;
//
//        String krt_2 = doc["kartu_2"];
//        kartu_2 = krt_2;
//
//        Serial.println("Kartu 1 : " + kartu_1);
//        Serial.println("Kartu 2 : " + kartu_2);
//
//        Serial.println();
//
//        lcd.clear();
//        lcd.setCursor(0, 0);
//        lcd.print("KARTU 1");
//        lcd.setCursor(0, 1);
//        lcd.print(kartu_1);
//
//        delay(2000);
//
//        lcd.clear();
//        lcd.setCursor(0, 0);
//        lcd.print("KARTU 2");
//        lcd.setCursor(0, 1);
//        lcd.print(kartu_2);
//
//        delay(2000);
//      }
//    }
//    else
//    {
//      USE_SERIAL.printf("[HTTP] GET data gagal, error: %s\n", http.errorToString(httpCode).c_str());
//    }
//    http.end();
//  }
//}

void sendData(){
// Send RFID value to CodeIgniter controller
  String rfid = id; // Replace with the actual RFID value

  // Prepare the HTTP request
  HTTPClient http;
  http.begin(client, "http://192.168.188.146/praktek8-rfid-with-arduino-json/presensi/add/"); // Replace with the actual URL of your CodeIgniter controller

  // Set the POST parameters
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  String postData = "rfid=" + rfid;
  
  // Send the POST request
  int httpResponseCode = http.POST(postData);

  // Check the response
  if (httpResponseCode == HTTP_CODE_OK) {
    String response = http.getString();
    Serial.println("Server response: " + response);
    if(rfid == response){
      Serial.println("Kartu = " + response + " terdaftar di database");
      Serial.println("Presensi berhasil");
      digitalWrite(pinBuzzer, HIGH);
      delay(250);
      digitalWrite(pinBuzzer, LOW);
      delay(200);
      digitalWrite(pinBuzzer, HIGH);
      delay(250);
      digitalWrite(pinBuzzer, LOW);
    }else{
      Serial.println("Kartu = " + rfid + " tidak terdaftar di database");
      Serial.println("Presensi gagal");
    }
  } else {
    Serial.print("Error sending request. HTTP response code: ");
    Serial.println(httpResponseCode);
  }

  // Cleanup
  http.end();


}
