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

namespace Gs2\Grade\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for describeGradeModelMasters: List Grade Model Masters
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#describegrademodelmasters
 */
class DescribeGradeModelMastersRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Filter by Grade Model name prefix */
    private $namePrefix;
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
     * @return DescribeGradeModelMastersRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeGradeModelMastersRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Filter by Grade Model name prefix */
	public function getNamePrefix(): ?string {
		return $this->namePrefix;
	}
    /** @param string|null $namePrefix Filter by Grade Model name prefix */
	public function setNamePrefix(?string $namePrefix) {
		$this->namePrefix = $namePrefix;
	}
    /**
     * @param string|null $namePrefix Filter by Grade Model name prefix
     * @return DescribeGradeModelMastersRequest
     */
	public function withNamePrefix(?string $namePrefix): DescribeGradeModelMastersRequest {
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
     * @return DescribeGradeModelMastersRequest
     */
	public function withPageToken(?string $pageToken): DescribeGradeModelMastersRequest {
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
     * @return DescribeGradeModelMastersRequest
     */
	public function withLimit(?int $limit): DescribeGradeModelMastersRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeGradeModelMastersRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeGradeModelMastersRequest())
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