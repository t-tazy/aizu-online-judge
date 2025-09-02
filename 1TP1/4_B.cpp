#include<iostream>
using namespace std;

int main() {
  double r, PI = 3.141592653589; // TODO: 本来はライブラリの定数
  cin >> r;
  printf("%f %f\n", r * r * PI, 2 * r * PI);

  return 0;
}
