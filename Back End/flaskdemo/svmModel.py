import pickle
from sklearn import datasets
import pandas as pd
import numpy as np
from sklearn import svm
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
np.random.seed(42)

#iris = datasets.load_iris()
#x = iris.data
#y = iris.target
#x_train, x_test, y_train, y_test = train_test_split(x, y, test_size= 0.2, random_state=4)
# x_test_mod = x_test.reshape(-1,1)
# x_train_mod = x_train.reshape(-1,1)
# y_test_mod = y_test.reshape(-1,1)
# y_train_mod = y_train.reshape(-1,1)
#y_pred_mod = svmmodel.predict(x_test)
df = pd.read_csv("../Datasets/encoded.csv")
x = df[['age', 'trestbps', 'chol', 'thalah', 'oldpeak', 'sex_0', 'sex_1',
       'cp_1', 'cp_2', 'cp_3', 'cp_4', 'fbs_0', 'fbs_1', 'restecg_0',
       'restecg_1', 'restecg_2', 'exang_0', 'exang_1', 'slope_1', 'slope_2',
       'slope_3', 'ca_0', 'ca_1', 'ca_2', 'ca_3', 'thal_3', 'thal_6', 'thal_7']]
y = np.ravel(df[['num']])
x_train, x_test, y_train, y_test = train_test_split(x, y, test_size=0.2, random_state=42)

#kernel="poly", C= 128.0, gamma= 3.0517578125e-05
svmmodel = svm.SVC(kernel="poly", C= 2.0, gamma= 1.0).fit(x_train,y_train)
y_pred = svmmodel.predict(x_test)


svmFile = open('SVMmodelNew.pckl', 'wb')
pickle.dump(svmmodel, svmFile)
svmFile.close()


from sklearn import metrics
print("accuracy:", (metrics.accuracy_score(y_test,y_pred)*100))
