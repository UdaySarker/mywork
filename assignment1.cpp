#include<iostream>
#include<stdlib.h>
using namespace std;
double calc(double);
int main(){
    double x0,x1=6,x2=5;
    double f0,f1,f2;
    double root;
    int i=0;
    f1=calc(x1);
    f2=calc(x2);
    while(i!=50){
        if(f1*f2>0){
            break;
        }else{
            x0=(x1+x2)/2;
            f0=calc(x0);
            if(f1*f0<0){
                x2=x0;
            }else{
                x1=x0;
                f1=f0;
            }

        }
        i++;
            if(abs(x2-x1)/x1<0.00001){
                root=(x1+x2)/2;
                system("pause");
                cout<<root<<endl;
            }
    }
    cout<<"Root is "<<root;
    return 0;
}

double calc(double a){
    return ((a*a)-(4*a)-10);
}
