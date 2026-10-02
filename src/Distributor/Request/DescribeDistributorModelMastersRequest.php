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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for describeDistributorModelMasters: List Distributor Model Masters
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#describedistributormodelmasters
 */
class DescribeDistributorModelMastersRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Filter by Distributor Model Master name prefix */
    private $namePrefix;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data acquired */
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
     * @return DescribeDistributorModelMastersRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeDistributorModelMastersRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Filter by Distributor Model Master name prefix */
	public function getNamePrefix(): ?string {
		return $this->namePrefix;
	}
    /** @param string|null $namePrefix Filter by Distributor Model Master name prefix */
	public function setNamePrefix(?string $namePrefix) {
		$this->namePrefix = $namePrefix;
	}
    /**
     * @param string|null $namePrefix Filter by Distributor Model Master name prefix
     * @return DescribeDistributorModelMastersRequest
     */
	public function withNamePrefix(?string $namePrefix): DescribeDistributorModelMastersRequest {
		$this->namePrefix = $namePrefix;
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
     * @return DescribeDistributorModelMastersRequest
     */
	public function withPageToken(?string $pageToken): DescribeDistributorModelMastersRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
    /** @return int|null Number of data acquired */
	public function getLimit(): ?int {
		return $this->limit;
	}
    /** @param int|null $limit Number of data acquired */
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
    /**
     * @param int|null $limit Number of data acquired
     * @return DescribeDistributorModelMastersRequest
     */
	public function withLimit(?int $limit): DescribeDistributorModelMastersRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeDistributorModelMastersRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeDistributorModelMastersRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withNamePrefix(array_key_exists('namePrefix', $data) && $data['namePrefix'] !== null ? $data['namePrefix'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "namePrefix" => $this->getNamePrefix(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}