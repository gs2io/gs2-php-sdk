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
 * Request for queryExecuteStampSheetLog: List transaction execution logs
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#queryexecutestampsheetlog
 */
class QueryExecuteStampSheetLogRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Microservice Type */
    private $service;
    /** @var string Microservice Method */
    private $method;
    /** @var string User ID */
    private $userId;
    /** @var string Acquire Action */
    private $action;
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
     * @return QueryExecuteStampSheetLogRequest
     */
	public function withNamespaceName(?string $namespaceName): QueryExecuteStampSheetLogRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Microservice Type */
	public function getService(): ?string {
		return $this->service;
	}
    /** @param string|null $service Microservice Type */
	public function setService(?string $service) {
		$this->service = $service;
	}
    /**
     * @param string|null $service Microservice Type
     * @return QueryExecuteStampSheetLogRequest
     */
	public function withService(?string $service): QueryExecuteStampSheetLogRequest {
		$this->service = $service;
		return $this;
	}
    /** @return string|null Microservice Method */
	public function getMethod(): ?string {
		return $this->method;
	}
    /** @param string|null $method Microservice Method */
	public function setMethod(?string $method) {
		$this->method = $method;
	}
    /**
     * @param string|null $method Microservice Method
     * @return QueryExecuteStampSheetLogRequest
     */
	public function withMethod(?string $method): QueryExecuteStampSheetLogRequest {
		$this->method = $method;
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
     * @return QueryExecuteStampSheetLogRequest
     */
	public function withUserId(?string $userId): QueryExecuteStampSheetLogRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Acquire Action */
	public function getAction(): ?string {
		return $this->action;
	}
    /** @param string|null $action Acquire Action */
	public function setAction(?string $action) {
		$this->action = $action;
	}
    /**
     * @param string|null $action Acquire Action
     * @return QueryExecuteStampSheetLogRequest
     */
	public function withAction(?string $action): QueryExecuteStampSheetLogRequest {
		$this->action = $action;
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
     * @return QueryExecuteStampSheetLogRequest
     */
	public function withBegin(?int $begin): QueryExecuteStampSheetLogRequest {
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
     * @return QueryExecuteStampSheetLogRequest
     */
	public function withEnd(?int $end): QueryExecuteStampSheetLogRequest {
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
     * @return QueryExecuteStampSheetLogRequest
     */
	public function withLongTerm(?bool $longTerm): QueryExecuteStampSheetLogRequest {
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
     * @return QueryExecuteStampSheetLogRequest
     */
	public function withPageToken(?string $pageToken): QueryExecuteStampSheetLogRequest {
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
     * @return QueryExecuteStampSheetLogRequest
     */
	public function withLimit(?int $limit): QueryExecuteStampSheetLogRequest {
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
     * @return QueryExecuteStampSheetLogRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): QueryExecuteStampSheetLogRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?QueryExecuteStampSheetLogRequest {
        if ($data === null) {
            return null;
        }
        return (new QueryExecuteStampSheetLogRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null)
            ->withMethod(array_key_exists('method', $data) && $data['method'] !== null ? $data['method'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAction(array_key_exists('action', $data) && $data['action'] !== null ? $data['action'] : null)
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
            "service" => $this->getService(),
            "method" => $this->getMethod(),
            "userId" => $this->getUserId(),
            "action" => $this->getAction(),
            "begin" => $this->getBegin(),
            "end" => $this->getEnd(),
            "longTerm" => $this->getLongTerm(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}