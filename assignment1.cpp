#include<iostream>
using namespace std;
double calc(double);
int main(){
    double x0,x1=5,x2=6;
    double f0,f1,f2;
    int i=0;
    f1=calc(x1);
    f2=calc(x2);
    x0=(x1+x2)/2;
    f0=calc(x0);
    if(f0*f2<0){
            x1=x0;
            x0=(x1+x2)/2;
            f1=calc(x1);
            f2=calc(x2);
            f0=calc(x0);
    }else if(f0*f1<0){
            x1=x0;
            x0=(x1+x2)/2;
            f1=calc(x1);
            f2=calc(x2);
            f0=calc(x0);
    }
    cout<<f1<<endl;
    cout<<f2<<endl;
    cout<<f0<<endl;
    if(f0*f2<0){
            x1=x0;
            x0=(x1+x2)/2;
            f1=calc(x1);
            f2=calc(x2);
            f0=calc(x0);
    }else if(f0*f1<0){
            x1=x0;
            x0=(x1+x2)/2;
            f1=calc(x1);
            f2=calc(x2);
            f0=calc(x0);
    }
    return 0;
}

double calc(double a){
    return ((a*a)-(4*a)-10);
}
