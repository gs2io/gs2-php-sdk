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

namespace Gs2\Money\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DescribeReceiptsRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var int */
    private $slot;
    /** @var int */
    private $begin;
    /** @var int */
    private $end;
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

	public function withNamespaceName(?string $namespaceName): DescribeReceiptsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DescribeReceiptsRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getSlot(): ?int {
		return $this->slot;
	}

	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}

	public function withSlot(?int $slot): DescribeReceiptsRequest {
		$this->slot = $slot;
		return $this;
	}

	public function getBegin(): ?int {
		return $this->begin;
	}

	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}

	public function withBegin(?int $begin): DescribeReceiptsRequest {
		$this->begin = $begin;
		return $this;
	}

	public function getEnd(): ?int {
		return $this->end;
	}

	public function setEnd(?int $end) {
		$this->end = $end;
	}

	public function withEnd(?int $end): DescribeReceiptsRequest {
		$this->end = $end;
		return $this;
	}

	public function getPageToken(): ?string {
		return $this->pageToken;
	}

	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}

	public function withPageToken(?string $pageToken): DescribeReceiptsRequest {
		$this->pageToken = $pageToken;
		return $this;
	}

	public function getLimit(): ?int {
		return $this->limit;
	}

	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}

	public function withLimit(?int $limit): DescribeReceiptsRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeReceiptsRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeReceiptsRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withSlot(empty($data['slot']) && $data['slot'] !== 0 ? null : $data['slot'])
            ->withBegin(empty($data['begin']) && $data['begin'] !== 0 ? null : $data['begin'])
            ->withEnd(empty($data['end']) && $data['end'] !== 0 ? null : $data['end'])
            ->withPageToken(empty($data['pageToken']) ? null : $data['pageToken'])
            ->withLimit(empty($data['limit']) && $data['limit'] !== 0 ? null : $data['limit']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "slot" => $this->getSlot(),
            "begin" => $this->getBegin(),
            "end" => $this->getEnd(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}