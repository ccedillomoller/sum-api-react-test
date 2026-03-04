import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'

function App() {
   const [a, setA] = useState("");
  const [b, setB] = useState("");
  const [result, setResult] = useState(null);

  const handleSubmit = async (e) => {
    e.preventDefault();
    const response = await fetch('http://localhost:8001/api/sum', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ a, b }),
    });
    const data = await response.json();
    if (!response.ok) {
      setResult(`Error: ${data.error}`);
    } else{
      setResult(data.sum);
    }
  }
  return (
    <>
     <div>
      <form onSubmit={handleSubmit}>
        <input type="number" placeholder='Enter the number a'
        value={a} onChange={(e) => setA(Number(e.target.value))}/> <br />
      <input type="text" placeholder='Enter the number b'
      value={b} onChange={(e) => setB(Number(e.target.value))}/> <br />
      <input type="submit" value="Calculate Sum"/>
      </form>
      {result !== null && <h2>Result: {result}</h2>}

     </div>
    </>
  )
}

export default App
