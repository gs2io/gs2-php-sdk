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
use Gs2\Log\Model\InGameLogTag;

/**
 * Request for queryInGameLog: List in-game logs
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#queryingamelog
 */
class QueryInGameLogRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var array Tags */
    private $tags;
    /** @var int Search range start date and time */
    private $begin;
    /** @var int Search range end date and time */
    private $end;
    /** @var bool Search logs for periods longer than 7 days */
    private $longTerm;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data items to retrieve */
    private $limit;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
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
     * @return QueryInGameLogRequest
     */
	public function withNamespaceName(?string $namespaceName): QueryInGameLogRequest {
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
     * @return QueryInGameLogRequest
     */
	public function withUserId(?string $userId): QueryInGameLogRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null Tags */
	public function getTags(): ?array {
		return $this->tags;
	}
    /** @param array|null $tags Tags */
	public function setTags(?array $tags) {
		$this->tags = $tags;
	}
    /**
     * @param array|null $tags Tags
     * @return QueryInGameLogRequest
     */
	public function withTags(?array $tags): QueryInGameLogRequest {
		$this->tags = $tags;
		return $this;
	}
    /** @return int|null Search range start date and time */
	public function getBegin(): ?int {
		return $this->begin;
	}
    /** @param int|null $begin Search range start date and time */
	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}
    /**
     * @param int|null $begin Search range start date and time
     * @return QueryInGameLogRequest
     */
	public function withBegin(?int $begin): QueryInGameLogRequest {
		$this->begin = $begin;
		return $this;
	}
    /** @return int|null Search range end date and time */
	public function getEnd(): ?int {
		return $this->end;
	}
    /** @param int|null $end Search range end date and time */
	public function setEnd(?int $end) {
		$this->end = $end;
	}
    /**
     * @param int|null $end Search range end date and time
     * @return QueryInGameLogRequest
     */
	public function withEnd(?int $end): QueryInGameLogRequest {
		$this->end = $end;
		return $this;
	}
    /** @return bool|null Search logs for periods longer than 7 days */
	public function getLongTerm(): ?bool {
		return $this->longTerm;
	}
    /** @param bool|null $longTerm Search logs for periods longer than 7 days */
	public function setLongTerm(?bool $longTerm) {
		$this->longTerm = $longTerm;
	}
    /**
     * @param bool|null $longTerm Search logs for periods longer than 7 days
     * @return QueryInGameLogRequest
     */
	public function withLongTerm(?bool $longTerm): QueryInGameLogRequest {
		$this->longTerm = $longTerm;
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
     * @return QueryInGameLogRequest
     */
	public function withPageToken(?string $pageToken): QueryInGameLogRequest {
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
     * @return QueryInGameLogRequest
     */
	public function withLimit(?int $limit): QueryInGameLogRequest {
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
     * @return QueryInGameLogRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): QueryInGameLogRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): QueryInGameLogRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?QueryInGameLogRequest {
        if ($data === null) {
            return null;
        }
        return (new QueryInGameLogRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTags(!array_key_exists('tags', $data) || $data['tags'] === null ? null : array_map(
                function ($item) {
                    return InGameLogTag::fromJson($item);
                },
                $data['tags']
            ))
            ->withBegin(array_key_exists('begin', $data) && $data['begin'] !== null ? $data['begin'] : null)
            ->withEnd(array_key_exists('end', $data) && $data['end'] !== null ? $data['end'] : null)
            ->withLongTerm(array_key_exists('longTerm', $data) ? $data['longTerm'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "tags" => $this->getTags() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTags()
            ),
            "begin" => $this->getBegin(),
            "end" => $this->getEnd(),
            "longTerm" => $this->getLongTerm(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}