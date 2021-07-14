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

namespace Gs2\Friend\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DescribeFollowsByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var bool */
    private $withProfile;
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

	public function withNamespaceName(?string $namespaceName): DescribeFollowsByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DescribeFollowsByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getWithProfile(): ?bool {
		return $this->withProfile;
	}

	public function setWithProfile(?bool $withProfile) {
		$this->withProfile = $withProfile;
	}

	public function withWithProfile(?bool $withProfile): DescribeFollowsByUserIdRequest {
		$this->withProfile = $withProfile;
		return $this;
	}

	public function getPageToken(): ?string {
		return $this->pageToken;
	}

	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}

	public function withPageToken(?string $pageToken): DescribeFollowsByUserIdRequest {
		$this->pageToken = $pageToken;
		return $this;
	}

	public function getLimit(): ?int {
		return $this->limit;
	}

	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}

	public function withLimit(?int $limit): DescribeFollowsByUserIdRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeFollowsByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeFollowsByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withWithProfile(empty($data['withProfile']) ? null : $data['withProfile'])
            ->withPageToken(empty($data['pageToken']) ? null : $data['pageToken'])
            ->withLimit(empty($data['limit']) ? null : $data['limit']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "withProfile" => $this->getWithProfile(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}