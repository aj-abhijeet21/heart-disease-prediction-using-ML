# -*- coding: utf-8 -*-
"""
Created on Mon Mar  4 19:55:52 2019

@author: lenovo
"""

# Dependencies
from flask import Flask, request, jsonify, render_template, redirect
from sklearn.externals import joblib
import traceback
import pandas as pd
import numpy as np
import mysql.connector
mydb = mysql.connector.connect( 
			  host="localhost",
			  user="root",
			  passwd="",
			  database="heartprediction"
			)
			
mycursor = mydb.cursor()

# Your API definition
app = Flask(__name__)
thalah = ""
bg = ""
sex = ""
age = ""
trestbps = ""
chol = ""
cp = ""
fbs = ""
restecg = ""
exang = ""
slope = ""
ca = ""
thal = ""
smoke = ""
diabeties = ""
exercise = ""
attack= ""
city= ""
phone= ""
fname= ""
lname= ""
flag = False
@app.route('/predict1', methods=['POST'])

def predict():
		if request.method == 'POST':
			global mail
			mail = request.form['sessionvar']
			global age
			age = request.form['age']
			global bg
			bg = request.form['blood_group']
			global trestbps
			trestbps = request.form['rblood_pressure']
			global chol
			chol = request.form['cholestrol']
			global thalah
			thalah = request.form['heart_rate']
			global oldpeak
			oldpeak = request.form['oldpeak']
			global sex 
			sex = request.form['sex']
			global cp
			cp = request.form['chest_pain']
			global fbs
			fbs = request.form['fblood_sugar']
			global restecg
			restecg = request.form['ecg']
			global exang 
			exang = request.form['angina']
			global slope 
			slope = request.form['slope']
			global ca 
			ca = request.form['ca']
			global thal 
			thal = request.form['thal']
			global smoke 
			smoke = request.form['exercise']
			global diabeties 
			diabeties= request.form['diabeties']
			global exercise
			exercise = request.form['exercise']
			global attack
			attack = request.form['attack']
			
			sql ="UPDATE allinfo SET age= '" + age +"', sex= '" + sex +"', blood_group= '" + bg +"', cholestrol= '" + chol + "', fblood_sugar='" + fbs +"',rblood_sugar='" + trestbps +"',chest_pain='" + cp +"',heart_rate='" + thalah +"',ecg='" + restecg +"',angina='" + exang +"',slope='" + slope +"',oldpeak= '" + oldpeak +"',thal='" + thal +"',smoke='" + smoke +"',diabeties='" + diabeties +"',attack= '" + attack +"',exercise='" + exercise+ "' WHERE email ='" + mail.strip() + "';"
			
			try:
				mycursor.execute(sql)	
				mydb.commit()
				#error = mycursor.rowcount + "record(s) affected"
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))
				
			
			#input: 63,145,233,150,2.3,0,1,1,0,0,0,0,1,0,0,1,1,0,0,0,1,1,0,0,0,0,1,0
			
			#data = [['Alex',10],['Bob',12],['Clarke',13]]
			#data = [['age',age],['sex',sex],['cp',cp],['trestbps',trestbps],['chol',chol],['fbs',fbs],['restecg',restecg],['thalah',thalah],['exang',exang],['oldpeak',oldpeak],['slope',slope],['ca',ca],['thal',thal]]
			data = [[age,sex,cp,trestbps,chol,fbs,restecg,thalah,exang,oldpeak,slope,ca,thal]]
			df = pd.DataFrame(data)
			#df = pd.DataFrame({age,sex,cp,trestbps,chol,fbs,restecg,thalah,exang,oldpeak,slope,ca,thal})
			df.columns = ['age','sex','cp','trestbps','chol','fbs','restecg','thalah','exang','oldpeak','slope','ca','thal']
			#df = pd.DataFrame(columns=['age', 'trestbps', 'chol', 'thalah', 'oldpeak', 'sex_0', 'sex_1','cp_1', 'cp_2', 'cp_3', 'cp_4', 'fbs_0', 'fbs_1', 'restecg_0','restecg_1', 'restecg_2', 'exang_0', 'exang_1', 'slope_1', 'slope_2','slope_3', 'ca_0', 'ca_1', 'ca_2', 'ca_3', 'thal_3', 'thal_6', 'thal_7'])
			
			df["sex"] = df["sex"].astype('category',categories=[0,1])
			df["fbs"] = df["fbs"].astype('category',categories=[0,1])
			df["exang"] = df["exang"].astype('category',categories=[0,1])
			df["cp"] = df["cp"].astype('category',categories=[1,2,3,4])
			df["restecg"] = df["restecg"].astype('category',categories=[0,1,2])
			df["slope"] = df["slope"].astype('category',categories=[1,2,3])
			df["ca"] = df["ca"].astype('category',categories=[0,1,2,3])
			df["thal"] = df["thal"].astype('category',categories=[3,6,7])
			#pd.get_dummies(df['cp'],prefix="cp")
			#print(df)
			
			df=pd.concat([df,pd.get_dummies(df['sex'],prefix='sex')],axis=1).drop(['sex'],axis=1)
			df=pd.concat([df,pd.get_dummies(df['cp'],prefix='cp')],axis=1).drop(['cp'],axis=1)
			df=pd.concat([df,pd.get_dummies(df['fbs'],prefix='fbs')],axis=1).drop(['fbs'],axis=1)
			df=pd.concat([df,pd.get_dummies(df['restecg'],prefix='restecg')],axis=1).drop(['restecg'],axis=1)
			df=pd.concat([df,pd.get_dummies(df['exang'],prefix='exang')],axis=1).drop(['exang'],axis=1)
			df=pd.concat([df,pd.get_dummies(df['slope'],prefix='slope')],axis=1).drop(['slope'],axis=1)
			df=pd.concat([df,pd.get_dummies(df['ca'],prefix='ca')],axis=1).drop(['ca'],axis=1)
			df=pd.concat([df,pd.get_dummies(df['thal'],prefix='thal')],axis=1).drop(['thal'],axis=1)
			
			x = df[['age', 'trestbps', 'chol', 'thalah', 'oldpeak', 'sex_0', 'sex_1','cp_1', 'cp_2', 'cp_3', 'cp_4', 'fbs_0', 'fbs_1', 'restecg_0','restecg_1', 'restecg_2', 'exang_0', 'exang_1', 'slope_1', 'slope_2','slope_3', 'ca_0', 'ca_1', 'ca_2', 'ca_3', 'thal_3', 'thal_6', 'thal_7']]
			class_predicted = int(lr.predict(x))
			value = "Predicted class:" + str(class_predicted)
	        #return(value)
			if(class_predicted == 0):
				type = '<50% diameter narrowing'
			if (class_predicted == 1):
				type = '<50% diameter narrowing'
			if (class_predicted == 2):
				type = '>50% diameter narrowing'
			if (class_predicted == 3):
				type = '>50% diameter narrowing'
			#if (type == '>50% diameter narrowing'):
			return redirect("http://localhost/heart/identify.php")
			#if (type == '<50% diameter narrowing'):
				
				#return render_template('report_less.html', thalach= thalah, trestbps = trestbps,fbs = fbs,address = city,age = age,fname = fname,lname = lname,email =  mail.strip(),phone = phone,gender = "male",bloodgroup = bg,chol = chol,thal = thal)			
@app.route('/predicttype', methods=['POST'])
def predicttype():
		if request.method == 'POST':
			mail = request.form['sessionvar']
			q1 = request.form['q1']
			q2 = request.form['q2']
			q3 = request.form['q3']
			q4 = request.form['q4']
			q5 = request.form['q5']
			q6 = request.form['q6']
			q7 = request.form['q7']
			q8 = request.form['q8']
			q9 = request.form['q9']
			q10 = request.form['q10']
			#age
			sql ="SELECT age FROM allinfo WHERE email= '" + mail.strip() +"';" 
			try:
				mycursor.execute(sql)	
				global age
				tuple1 = mycursor.fetchone()
				mydb.commit()
				age = str(tuple1).strip('(,)')
				age = age + " years"
				
				#error = mycursor.rowcount + "record(s) affected"
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))
			#thalach	
			sql ="SELECT heart_rate FROM allinfo WHERE email= '" + mail.strip() +"';" 
			try:
				mycursor.execute(sql)	
				global thalach
				thalach = str(mycursor.fetchone()).strip('(,)')
				#thalach = thalach.strip('(,)')
				mydb.commit()
				thalach = thalach + "bps"
								
				#error = mycursor.rowcount + "record(s) affected"
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))
			#trestbps
			sql ="SELECT rblood_sugar FROM allinfo WHERE email= '" + mail.strip() +"';" 
			try:
				mycursor.execute(sql)	
				global trestbps
				trestbps = str(mycursor.fetchone()).strip('(,)')
				mydb.commit()
				trestbps = trestbps + " mm/Hg"
				
				#error = mycursor.rowcount + "record(s) affected"
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))
			#fbs
			sql ="SELECT fblood_sugar FROM allinfo WHERE email= '" + mail.strip() +"';" 
			try:
				mycursor.execute(sql)	
				global fbs
				fbs = str(mycursor.fetchone()).strip('(,)')
				mydb.commit()
				if(fbs == "1"):
					fbs = "> 120 mg/dl"
				else:
					fbs = "< 120 mg/dl"
				#error = mycursor.rowcount + "record(s) affected"
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))
			#gender
			sql ="SELECT sex FROM allinfo WHERE email= '" + mail.strip() +"';" 
			try:
				mycursor.execute(sql)	
				global sex
				sex = str(mycursor.fetchone()).strip('(,)')
				mydb.commit()
				if (sex == "0"):
					sex = "Female"
				else:
					sex = "Male"
				#error = mycursor.rowcount + "record(s) affected"
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))
			#bloodgroup
			sql ="SELECT blood_group FROM allinfo WHERE email= '" + mail.strip() +"';" 
			try:
				mycursor.execute(sql)	
				global bg
				tuple1 = mycursor.fetchone()
				mydb.commit()
				for item in tuple1:
					bg = str(item[:])
				
				#error = mycursor.rowcount + "record(s) affected"
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))
			#chol
			sql ="SELECT cholestrol FROM allinfo WHERE email= '" + mail.strip() +"';" 
			try:
				mycursor.execute(sql)	
				global chol
				chol = str(mycursor.fetchone()).strip('(,)')
				mydb.commit()
				chol = chol + " mg/dl"
				
				#error = mycursor.rowcount + "record(s) affected"
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))
			#thal
			sql ="SELECT thal FROM allinfo WHERE email= '" + mail.strip() +"';" 
			try:
				mycursor.execute(sql)	
				global thal
				thal =str(mycursor.fetchone()).strip('(,)')
				mydb.commit()
				if(thal == "3"):
					thal = "normal"
				if(thal == "6"):
					thal = "fixed defect"
				if(thal == "7"):
					thal = "reversable defect"
				
				#error = mycursor.rowcount + "record(s) affected"
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))
			#city
			sql ="SELECT city FROM allinfo WHERE email= '" + mail.strip() +"';" 
			try:
				mycursor.execute(sql)	
				global city
				tuple1 = mycursor.fetchone()
				mydb.commit()
				for item in tuple1:
					city = str(item[:])
				#error = mycursor.rowcount + "record(s) affected"ds
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))
			#phone	
			sql ="SELECT phone FROM allinfo WHERE email= '" + mail.strip() +"';" 
			try:
				mycursor.execute(sql)	
				global phone
				tuple1 = mycursor.fetchone()
				mydb.commit()
				for item in tuple1:
					phone = str(item[:])
				phone = "+91" + phone
				#error = mycursor.rowcount + "record(s) affected"
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))
			#fname
			sql ="SELECT f_name FROM allinfo WHERE email= '" + mail.strip() +"';" 

			try:
				mycursor.execute(sql)	
				global fname
				tuple1 = mycursor.fetchone()
				mydb.commit()
				for item in tuple1:
					fname = str(item[:])
				#error = mycursor.rowcount + "record(s) affected"
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))
			#lname
			sql ="SELECT l_name FROM allinfo WHERE email= '" + mail.strip() +"';" 
			try:
				mycursor.execute(sql)	
				global lname
				tuple1 = mycursor.fetchone()	
				mydb.commit()
				for item in tuple1:
					lname = str(item[:])
				#lname.strip('('',)')
				#error = mycursor.rowcount + "record(s) affected"
			except mysql.connector.Error as err:
				print("Something went wrong: {} "+format(err))

			
			data = [[q1,q2,q3,q4,q5,q6,q7,q8,q9,q10]]
			df = pd.DataFrame(data)
			#df = pd.DataFrame({age,sex,cp,trestbps,chol,fbs,restecg,thalah,exang,oldpeak,slope,ca,thal})
			df.columns = ['q1','q2','q3','q4','q5','q6','q7','q8','q9','q10']
			x = df
			disease = int(lm.predict(x))
			value = "Predicted disease type:" + str(disease)
			
			if(disease == 0):
				type = 'Coronary Artery Disease'
				return render_template('report_coronary.html', thalach= thalach, trestbps = trestbps,fbs = fbs,predicted = type,address = city,age = age,fname = fname,lname = lname,email =  mail.strip(),phone = phone,gender = sex,bloodgroup = bg,chol = chol,thal = thal)

			if (disease == 1):
				type = 'Valvular Heart Disease'
				return render_template('report_valvular.html', thalach= thalah, trestbps = trestbps,fbs = fbs,predicted = type,address = city,age = age,fname = fname,lname = lname,email =  mail.strip(),phone = phone,gender = sex,bloodgroup = bg,chol = chol,thal = thal)
				
if __name__ == '__main__':
	port = 12345 # If you don't provide any port the port will be set to 12345
	lr = joblib.load("model.pkl") # Load "model.pkl"
	lm = joblib.load("linearmodel.pkl")
	print ('Model loaded')
	model_columns = joblib.load("model_columns.pkl") # Load "model_columns.pkl"
	print ('Model columns loaded')
	app.run(port=port, debug=True)