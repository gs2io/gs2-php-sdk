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

/**
 * Request for describeReceipts: List receipts
 *
 * @see https://docs.gs2.io/api_reference/money/sdk/#describereceipts
 */
class DescribeReceiptsRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var int Slot */
    private $slot;
    /** @var int Search start date and time */
    private $begin;
    /** @var int Search end date and time */
    private $end;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data items to retrieve */
    private $limit;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return DescribeReceiptsRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeReceiptsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return DescribeReceiptsRequest
     */
	public function withUserId(?string $userId): DescribeReceiptsRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Slot */
	public function getSlot(): ?int {
		return $this->slot;
	}
    /** @param int|null $slot Slot */
	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}
    /**
     * @param int|null $slot Slot
     * @return DescribeReceiptsRequest
     */
	public function withSlot(?int $slot): DescribeReceiptsRequest {
		$this->slot = $slot;
		return $this;
	}
    /** @return int|null Search start date and time */
	public function getBegin(): ?int {
		return $this->begin;
	}
    /** @param int|null $begin Search start date and time */
	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}
    /**
     * @param int|null $begin Search start date and time
     * @return DescribeReceiptsRequest
     */
	public function withBegin(?int $begin): DescribeReceiptsRequest {
		$this->begin = $begin;
		return $this;
	}
    /** @return int|null Search end date and time */
	public function getEnd(): ?int {
		return $this->end;
	}
    /** @param int|null $end Search end date and time */
	public function setEnd(?int $end) {
		$this->end = $end;
	}
    /**
     * @param int|null $end Search end date and time
     * @return DescribeReceiptsRequest
     */
	public function withEnd(?int $end): DescribeReceiptsRequest {
		$this->end = $end;
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
     * @return DescribeReceiptsRequest
     */
	public function withPageToken(?string $pageToken): DescribeReceiptsRequest {
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
     * @return DescribeReceiptsRequest
     */
	public function withLimit(?int $limit): DescribeReceiptsRequest {
		$this->limit = $limit;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return DescribeReceiptsRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DescribeReceiptsRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeReceiptsRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeReceiptsRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSlot(array_key_exists('slot', $data) && $data['slot'] !== null ? $data['slot'] : null)
            ->withBegin(array_key_exists('begin', $data) && $data['begin'] !== null ? $data['begin'] : null)
            ->withEnd(array_key_exists('end', $data) && $data['end'] !== null ? $data['end'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
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
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}