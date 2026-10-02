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

namespace Gs2\Freeze\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for describeOutputs: List stage update progress outputs
 *
 * @see https://docs.gs2.io/api_reference/freeze/sdk/#describeoutputs
 */
class DescribeOutputsRequest extends Gs2BasicRequest {
    /** @var string Stage name */
    private $stageName;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data items to retrieve */
    private $limit;
    /** @return string|null Stage name */
	public function getStageName(): ?string {
		return $this->stageName;
	}
    /** @param string|null $stageName Stage name */
	public function setStageName(?string $stageName) {
		$this->stageName = $stageName;
	}
    /**
     * @param string|null $stageName Stage name
     * @return DescribeOutputsRequest
     */
	public function withStageName(?string $stageName): DescribeOutputsRequest {
		$this->stageName = $stageName;
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
     * @return DescribeOutputsRequest
     */
	public function withPageToken(?string $pageToken): DescribeOutputsRequest {
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
     * @return DescribeOutputsRequest
     */
	public function withLimit(?int $limit): DescribeOutputsRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeOutputsRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeOutputsRequest())
            ->withStageName(array_key_exists('stageName', $data) && $data['stageName'] !== null ? $data['stageName'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "stageName" => $this->getStageName(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}