# -*- coding: utf-8 -*-
"""
Created on Thu Feb 28 23:41:00 2019

@author: lenovo
"""
import numpy as np
np.random.seed(42)
import pandas as pd
df = pd.read_csv("Datasets/data.csv")
data = df[['num','sex','cp','fbs','restecg','exang','slope','ca','thal']]
#target = df[['num']]
print(df.columns)
#print("Original Features:\n", list(data.columns), "\n")
#data_dummies = pd.get_dummies(data)
#print("Features after one hot encoding:\n", list(data_dummies.columns))

df=pd.concat([df,pd.get_dummies(df['sex'],prefix='sex')],axis=1).drop(['sex'],axis=1)
df=pd.concat([df,pd.get_dummies(df['cp'],prefix='cp')],axis=1).drop(['cp'],axis=1)
df=pd.concat([df,pd.get_dummies(df['fbs'],prefix='fbs')],axis=1).drop(['fbs'],axis=1)
df=pd.concat([df,pd.get_dummies(df['restecg'],prefix='restecg')],axis=1).drop(['restecg'],axis=1)
df=pd.concat([df,pd.get_dummies(df['exang'],prefix='exang')],axis=1).drop(['exang'],axis=1)
df=pd.concat([df,pd.get_dummies(df['slope'],prefix='slope')],axis=1).drop(['slope'],axis=1)
df=pd.concat([df,pd.get_dummies(df['ca'],prefix='ca')],axis=1).drop(['ca'],axis=1)
df=pd.concat([df,pd.get_dummies(df['thal'],prefix='thal')],axis=1).drop(['thal'],axis=1)
#df=pd.concat([df,pd.get_dummies(df['num'],prefix='num')],axis=1).drop(['num'],axis=1)

#z = df1.pop('ca').values #63 with rbs
#z1 = df1.pop('thalach').values
#z2 = df1.pop('chol').values
#z3 = df1.pop('age').values
#df = pd.concat([df, target], axis=1)
with open("Datasets/encoded_new.csv", 'w', encoding='utf-8') as f:
    df.to_csv(f, index=False)

from sklearn.model_selection import train_test_split
x = df[['age', 'trestbps', 'chol', 'thalah', 'oldpeak', 'sex_0', 'sex_1',
       'cp_1', 'cp_2', 'cp_3', 'cp_4', 'fbs_0', 'fbs_1', 'restecg_0',
       'restecg_1', 'restecg_2', 'exang_0', 'exang_1', 'slope_1', 'slope_2',
       'slope_3', 'ca_0', 'ca_1', 'ca_2', 'ca_3', 'thal_3', 'thal_6', 'thal_7']]
print(df.columns)
y = np.ravel(df[['num']])
print("X.shape: {}  y.shape: {}".format(x.shape, y.shape))
x_train, x_test, y_train, y_test = train_test_split(x, y, test_size=0.2, random_state=42)
#y_train = np.argmax(y_train, axis=1)




from sklearn.linear_model import LogisticRegression
logreg = LogisticRegression(solver="newton-cg", multi_class="ovr")
logreg.fit(x_train, y_train)
print("Accuracy for Logistic Regression: ",logreg.score(x_train, y_train)*100)






