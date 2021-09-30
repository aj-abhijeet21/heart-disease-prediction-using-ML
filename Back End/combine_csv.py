import pandas as pd
import numpy as np
import matplotlib
file1 = "C:\\Users\\lenovo\\Downloads\\Compressed\\heartdiseaseprediction\\hungarian.csv"
df = pd.read_csv(file1, sep= ' ', header= None)
csv_header = 'Age,Sex,chesp pain type,resting bp,cholestrol,fasting blood sugar,electrocardiographic ,max heart rate,exercise induced angina,oldpeak,slope of peak exercise,ca,thal,num'
df = df.replace(to_replace = -9 , value = np.nan)
df = df.replace(-9.1, np.NaN)
# df = df.replace(-9.2, np.NaN)
# print(df.count())
# print(df.interpolate().count())

df.interpolate(method = 'linear', axis=0).ffill().bfill()
df.fillna(df.mean(), inplace = True)
df.to_csv('processed_hungarian.csv', sep=',', index=False)

y = df.pop('num').values
#z = df.pop('thalach').values
z1 = df.pop('fbs').values
#z2 = df.pop('chol').values
z3 = df.pop('thalach').values
from sklearn.model_selection import train_test_split
x_train, x_test, y_train, y_test = train_test_split(df, y, test_size=0.2, random_state=109)

from sklearn import svm
clf = svm.SVC(kernel="linear")
clf.fit(x_train,y_train)
y_pred = clf.predict(x_test)

from sklearn import metrics
print("accuracy:", (metrics.accuracy_score(y_test,y_pred)*100))