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

class CountIssueStampSheetLogRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var bool */
    private $service;
    /** @var bool */
    private $method;
    /** @var bool */
    private $userId;
    /** @var bool */
    private $action;
    /** @var int */
    private $begin;
    /** @var int */
    private $end;
    /** @var bool */
    private $longTerm;
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
	public function withNamespaceName(?string $namespaceName): CountIssueStampSheetLogRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getService(): ?bool {
		return $this->service;
	}
	public function setService(?bool $service) {
		$this->service = $service;
	}
	public function withService(?bool $service): CountIssueStampSheetLogRequest {
		$this->service = $service;
		return $this;
	}
	public function getMethod(): ?bool {
		return $this->method;
	}
	public function setMethod(?bool $method) {
		$this->method = $method;
	}
	public function withMethod(?bool $method): CountIssueStampSheetLogRequest {
		$this->method = $method;
		return $this;
	}
	public function getUserId(): ?bool {
		return $this->userId;
	}
	public function setUserId(?bool $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?bool $userId): CountIssueStampSheetLogRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getAction(): ?bool {
		return $this->action;
	}
	public function setAction(?bool $action) {
		$this->action = $action;
	}
	public function withAction(?bool $action): CountIssueStampSheetLogRequest {
		$this->action = $action;
		return $this;
	}
	public function getBegin(): ?int {
		return $this->begin;
	}
	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}
	public function withBegin(?int $begin): CountIssueStampSheetLogRequest {
		$this->begin = $begin;
		return $this;
	}
	public function getEnd(): ?int {
		return $this->end;
	}
	public function setEnd(?int $end) {
		$this->end = $end;
	}
	public function withEnd(?int $end): CountIssueStampSheetLogRequest {
		$this->end = $end;
		return $this;
	}
	public function getLongTerm(): ?bool {
		return $this->longTerm;
	}
	public function setLongTerm(?bool $longTerm) {
		$this->longTerm = $longTerm;
	}
	public function withLongTerm(?bool $longTerm): CountIssueStampSheetLogRequest {
		$this->longTerm = $longTerm;
		return $this;
	}
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
	public function withPageToken(?string $pageToken): CountIssueStampSheetLogRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
	public function withLimit(?int $limit): CountIssueStampSheetLogRequest {
		$this->limit = $limit;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): CountIssueStampSheetLogRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?CountIssueStampSheetLogRequest {
        if ($data === null) {
            return null;
        }
        return (new CountIssueStampSheetLogRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withService(array_key_exists('service', $data) ? $data['service'] : null)
            ->withMethod(array_key_exists('method', $data) ? $data['method'] : null)
            ->withUserId(array_key_exists('userId', $data) ? $data['userId'] : null)
            ->withAction(array_key_exists('action', $data) ? $data['action'] : null)
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