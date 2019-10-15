#include<iostream>
using namespace std;
double calc(double);
int main(){
    double x0,x1=-2,x2=-1;
    double f0,f1,f2;
    int i=0;
   /* while(i!=7){
        f1=calc(x1);
        f2=calc(x2);
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
        cout<<x0<<"\t"<<f0<<endl;
        i++;
    }*/
    cout<<calc(1)<<endl;
    return 0;
}

double calc(double a){
    cin>>a;
    return ((a*a)-(4*a)-10);
}
