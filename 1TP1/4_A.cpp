#include<iostream>
using namespace std;

int main() {
  int a, b; // 10^9だからintでいけるはず
  cin >> a >> b;
  int d = a / b;
  int r = a % b;
  double f = (double)a / (double)b;

  printf("%d %d %f\n", d, r, f);

  return 0;
}
