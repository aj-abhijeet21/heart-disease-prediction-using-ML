# -*- coding: utf-8 -*-
"""
Created on Wed Feb 27 13:39:26 2019

@author: lenovo
"""

import pandas as pd
file1 = "Datasets/data.csv"
df1 = pd.read_csv(file1, sep= ',')
import numpy as np
np.random.seed(42)

#print(df)
y = df1.pop('num').values

# print(list(df))
#z = df1.pop('ca').values #63 with rbs
#z1 = df1.pop('thalach').values
#z2 = df1.pop('chol').values
#z3 = df1.pop('age').values

from sklearn.model_selection import train_test_split
x_train, x_test, y_train, y_test = train_test_split(df1, y, test_size=0.2, random_state=42)

from sklearn import svm
clf = svm.SVC(kernel="poly", gamma= 2.0) #rbf = 61.66 #for newheart.csv
#clf = svm.SVC(kernel="poly", C= 128.0, gamma= 3.0517578125e-05) # accuracy:63 for heart.csv local] 4.0 -1.0 5.38721 (best c=2.0, g=1.0, rate=6.06061)
#clf = svm.SVC(kernel="rbf", C= 32.0, gamma= 3.0517578125e-05)
clf.fit(x_train,y_train)
y_pred = clf.predict(x_test)

from sklearn import metrics
print("accuracy:", (metrics.accuracy_score(y_test,y_pred)*100))



