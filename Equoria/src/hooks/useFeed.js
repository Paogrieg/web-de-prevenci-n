import { useState, useEffect, useCallback } from "react";
import { newsApi, testimonialsApi, lawsApi } from "../services/endpoints";

export function useFeed() {
  // 1. Agregamos "feed" como un estado para que no cambie de orden al buscar
  const [feed, setFeed]                 = useState([]); 
  const [news, setNews]                 = useState([]);
  const [testimonials, setTestimonials] = useState([]);
  const [laws, setLaws]                 = useState([]);
  const [loading, setLoading]           = useState(true);
  const [error, setError]               = useState(null);

  const fetchAll = useCallback(async () => {
    setLoading(true);
    setError(null);
    try {
      const [nRes, tRes, lRes] = await Promise.all([
        newsApi.list(),
        testimonialsApi.list(),
        lawsApi.list(),
      ]);

      // Mapeamos los datos para ponerles su etiqueta (tipo)
      const newsData = (nRes.data || nRes || []).map(n => ({ ...n, type: "news" }));
      const testData = (tRes.data || tRes || []).map(t => ({ ...t, type: "testimony" }));
      const lawsData = (lRes.data || lRes || []).map(l => ({ ...l, type: "law" }));

      setNews(newsData);
      setTestimonials(testData);
      setLaws(lawsData);

      // 2. Juntamos todo en un solo arreglo general
      const combinedFeed = [...newsData, ...testData, ...lawsData];

      // 3. Mezclamos el arreglo de forma completamente aleatoria (Random)
      combinedFeed.sort(() => Math.random() - 0.5);

      // 4. Guardamos el feed ya mezclado
      setFeed(combinedFeed);

    } catch (e) {
      setError(e.response?.status === 401 ? "Sesión expirada o inválida" : (e.message || "No se pudo conectar con la API"));
    } finally {
      setLoading(false);
    }
  }, []);

  useEffect(() => { fetchAll(); }, [fetchAll]);

  return { feed, news, testimonials, laws, loading, error, refetch: fetchAll };
}