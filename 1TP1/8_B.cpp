#include<iostream>
using namespace std;

int main() {
  char str[1001];

  while(1) {
    int sum = 0;
    cin >> str;

    if (str[0] == '0') break;

    int i = 0;
    while(str[i]) {
      sum += str[i] - '0';
      i++;
    }

    cout << sum << endl;
  }

  return 0;
}
