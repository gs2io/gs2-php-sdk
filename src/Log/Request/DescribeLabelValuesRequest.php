<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Log\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for describeLabelValues: Get list of label values for a specific metric
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#describelabelvalues
 */
class DescribeLabelValuesRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Metric name to filter by */
    private $metricName;
    /** @var string Filter by label name prefix */
    private $labelNamePrefix;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data items to retrieve */
    private $limit;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return DescribeLabelValuesRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeLabelValuesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Metric name to filter by */
	public function getMetricName(): ?string {
		return $this->metricName;
	}
    /** @param string|null $metricName Metric name to filter by */
	public function setMetricName(?string $metricName) {
		$this->metricName = $metricName;
	}
    /**
     * @param string|null $metricName Metric name to filter by
     * @return DescribeLabelValuesRequest
     */
	public function withMetricName(?string $metricName): DescribeLabelValuesRequest {
		$this->metricName = $metricName;
		return $this;
	}
    /** @return string|null Filter by label name prefix */
	public function getLabelNamePrefix(): ?string {
		return $this->labelNamePrefix;
	}
    /** @param string|null $labelNamePrefix Filter by label name prefix */
	public function setLabelNamePrefix(?string $labelNamePrefix) {
		$this->labelNamePrefix = $labelNamePrefix;
	}
    /**
     * @param string|null $labelNamePrefix Filter by label name prefix
     * @return DescribeLabelValuesRequest
     */
	public function withLabelNamePrefix(?string $labelNamePrefix): DescribeLabelValuesRequest {
		$this->labelNamePrefix = $labelNamePrefix;
		return $this;
	}
    /** @return string|null Token specifying the position from which to start acquiring data */
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
    /** @param string|null $pageToken Token specifying the position from which to start acquiring data */
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
    /**
     * @param string|null $pageToken Token specifying the position from which to start acquiring data
     * @return DescribeLabelValuesRequest
     */
	public function withPageToken(?string $pageToken): DescribeLabelValuesRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
    /** @return int|null Number of data items to retrieve */
	public function getLimit(): ?int {
		return $this->limit;
	}
    /** @param int|null $limit Number of data items to retrieve */
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
    /**
     * @param int|null $limit Number of data items to retrieve
     * @return DescribeLabelValuesRequest
     */
	public function withLimit(?int $limit): DescribeLabelValuesRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeLabelValuesRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeLabelValuesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMetricName(array_key_exists('metricName', $data) && $data['metricName'] !== null ? $data['metricName'] : null)
            ->withLabelNamePrefix(array_key_exists('labelNamePrefix', $data) && $data['labelNamePrefix'] !== null ? $data['labelNamePrefix'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "metricName" => $this->getMetricName(),
            "labelNamePrefix" => $this->getLabelNamePrefix(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}