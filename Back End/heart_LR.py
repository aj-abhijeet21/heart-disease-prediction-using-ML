from sklearn.linear_model import LogisticRegression
model = LogisticRegression(C=1000.0, class_weight=None, dual=False,fit_intercept=True, intercept_scaling=1, max_iter=100,multi_class='ovr', n_jobs=1, penalty='l1', random_state=None,solver='liblinear', tol=0.0001, verbose=0, warm_start=False)

import pandas as pd
df = pd.read_csv("Datasets/newheart.csv")
y = df.pop('num').values

#from sklearn.impute import SimpleImputer
#imp = SimpleImputer(missing_values = 'nan', strategy = 'mean')
#imp.fit(df[:])
#newdf = imp.transform(df)
#import pandas as pd 
#cols = ['0','1','2','3','4','5','6','7','8','9','10','11','12','13']  # We don't want to convert the Final grade column.
#for col in cols:  # Iterate over chosen columns
#	df[col] = pd.to_numeric(df[col])

# print(list(df))
#y = pd.DataFrame(data= y, index=None)
#df1 = pd.DataFrame({'13': y[:]})

#print(df1.info())
#print(type(df1))
#REMOVING THALACH
#from sklearn import preprocessing
#from sklearn import utils

from sklearn.model_selection import train_test_split
x_train, x_test, y_train, y_test = train_test_split(df, y, test_size=0.2, random_state=109)



model.fit(x_train,y_train)
y_pred = model.predict(x_test)

from sklearn import metrics
print("accuracy:", metrics.accuracy_score(y_test,y_pred)*100)

