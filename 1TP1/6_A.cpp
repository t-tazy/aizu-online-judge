#include<iostream>
using namespace std;

int main() {
  int n;
  cin >> n;

  int numbers[n] = {};

  for (int i = n - 1; i >= 0; i--) {
    cin >> numbers[i];
  }

  for (int i = 0; i < n; i++) {
    cout << numbers[i];
    if (i != (n - 1)) cout << ' ';
  }

  cout << endl;

  return 0;
}
