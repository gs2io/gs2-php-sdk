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

class DescribeLabelValuesRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $metricName;
    /** @var string */
    private $labelNamePrefix;
    /** @var string */
    private $pageToken;
    /** @var int */
    private $limit;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): DescribeLabelValuesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getMetricName(): ?string {
		return $this->metricName;
	}
	public function setMetricName(?string $metricName) {
		$this->metricName = $metricName;
	}
	public function withMetricName(?string $metricName): DescribeLabelValuesRequest {
		$this->metricName = $metricName;
		return $this;
	}
	public function getLabelNamePrefix(): ?string {
		return $this->labelNamePrefix;
	}
	public function setLabelNamePrefix(?string $labelNamePrefix) {
		$this->labelNamePrefix = $labelNamePrefix;
	}
	public function withLabelNamePrefix(?string $labelNamePrefix): DescribeLabelValuesRequest {
		$this->labelNamePrefix = $labelNamePrefix;
		return $this;
	}
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
	public function withPageToken(?string $pageToken): DescribeLabelValuesRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
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