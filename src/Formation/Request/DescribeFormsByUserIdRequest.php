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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DescribeFormsByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $moldModelName;
    /** @var string */
    private $userId;
    /** @var string */
    private $pageToken;
    /** @var int */
    private $limit;
    /** @var string */
    private $timeOffsetToken;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): DescribeFormsByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getMoldModelName(): ?string {
		return $this->moldModelName;
	}
	public function setMoldModelName(?string $moldModelName) {
		$this->moldModelName = $moldModelName;
	}
	public function withMoldModelName(?string $moldModelName): DescribeFormsByUserIdRequest {
		$this->moldModelName = $moldModelName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): DescribeFormsByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
	public function withPageToken(?string $pageToken): DescribeFormsByUserIdRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
	public function withLimit(?int $limit): DescribeFormsByUserIdRequest {
		$this->limit = $limit;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): DescribeFormsByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeFormsByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeFormsByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMoldModelName(array_key_exists('moldModelName', $data) && $data['moldModelName'] !== null ? $data['moldModelName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "moldModelName" => $this->getMoldModelName(),
            "userId" => $this->getUserId(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}