# -*- coding: utf-8 -*-
"""
Created on Mon Mar 11 21:39:53 2019

@author: lenovo
"""

import mysql.connector

mydb = mysql.connector.connect( 
  host="localhost",
  user="root",
  passwd="",
  database="heartprediction"
)

mycursor = mydb.cursor()
mail = "kamran"
sql = "SELECT age, sex, blood_group from allinfo WHERE email ='"+mail+"';" 
"""
sql ="UPDATE medical_history SET age= " + age +", sex= " + sex +", blood_group= " + mail +",cholestrol= " + chol +",fblood_sugar=" + fbs +",rblood_sugar=" + restbps +",chest_pain=" + cp +",heart_rate=" + thalah +",ecg=" + restecg +",angina=" + exang +",slope=" + slope +",oldpeak= " + oldpeak +",thal=" + thal +",smoke=" + smoke +",diabeties=" + diabeties +",attack= " + attack +",exercise=" + exercise + "WHERE email = " + mail +";"
"""
mycursor.execute(sql)
test = mycursor.fetchone()
mydb.commit()
print(test)
print(mycursor.rowcount, "record(s) affected") 

sex = 0
bg = 0
for row in mycursor:
	global age
	age = row.age
	sex = row.sex
	bg = row.blood_group
global age
print(age)	