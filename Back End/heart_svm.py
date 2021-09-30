import sklearn
import pandas as pd
file1 = "Datasets/file.csv"
df = pd.read_csv(file1, sep = ',')
# print(list(df))
#z = df.pop('thalach').values
#z1 = df.pop('fasting blood sugar').values
#z2 = df.pop('chol').values
#z3 = df.pop('thal').values
y = df.pop('num').values



from sklearn.model_selection import train_test_split
x_train, x_test, y_train, y_test = train_test_split(df, y, test_size=0.2, random_state=109)

from sklearn import svm
clf = svm.SVC(kernel="linear")
clf.fit(x_train,y_train)
y_pred = clf.predict(x_test)

from sklearn import metrics
print("accuracy:", (metrics.accuracy_score(y_test,y_pred)*100))

#1st run: 55
#2nd run: 53 removed thalach
#3rd run: 58 removed fbs
#4th run: 55 removed chol
#5th run: 58 removed sex

#from sklearn import datasets
#from sklearn import metrics
#from sklearn.ensemble import ExtraTreesClassifier
# load the iris datasets
# fit an Extra Trees model to the data
#model = ExtraTreesClassifier()
#model.fit(x_train, y_train)
# display the relative importance of each attribute
#print(model.feature_importances_)
