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

class QueryExecuteStampSheetLogRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $service;
    /** @var string */
    private $method;
    /** @var string */
    private $userId;
    /** @var string */
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

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): QueryExecuteStampSheetLogRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getService(): ?string {
		return $this->service;
	}

	public function setService(?string $service) {
		$this->service = $service;
	}

	public function withService(?string $service): QueryExecuteStampSheetLogRequest {
		$this->service = $service;
		return $this;
	}

	public function getMethod(): ?string {
		return $this->method;
	}

	public function setMethod(?string $method) {
		$this->method = $method;
	}

	public function withMethod(?string $method): QueryExecuteStampSheetLogRequest {
		$this->method = $method;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): QueryExecuteStampSheetLogRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getAction(): ?string {
		return $this->action;
	}

	public function setAction(?string $action) {
		$this->action = $action;
	}

	public function withAction(?string $action): QueryExecuteStampSheetLogRequest {
		$this->action = $action;
		return $this;
	}

	public function getBegin(): ?int {
		return $this->begin;
	}

	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}

	public function withBegin(?int $begin): QueryExecuteStampSheetLogRequest {
		$this->begin = $begin;
		return $this;
	}

	public function getEnd(): ?int {
		return $this->end;
	}

	public function setEnd(?int $end) {
		$this->end = $end;
	}

	public function withEnd(?int $end): QueryExecuteStampSheetLogRequest {
		$this->end = $end;
		return $this;
	}

	public function getLongTerm(): ?bool {
		return $this->longTerm;
	}

	public function setLongTerm(?bool $longTerm) {
		$this->longTerm = $longTerm;
	}

	public function withLongTerm(?bool $longTerm): QueryExecuteStampSheetLogRequest {
		$this->longTerm = $longTerm;
		return $this;
	}

	public function getPageToken(): ?string {
		return $this->pageToken;
	}

	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}

	public function withPageToken(?string $pageToken): QueryExecuteStampSheetLogRequest {
		$this->pageToken = $pageToken;
		return $this;
	}

	public function getLimit(): ?int {
		return $this->limit;
	}

	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}

	public function withLimit(?int $limit): QueryExecuteStampSheetLogRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?QueryExecuteStampSheetLogRequest {
        if ($data === null) {
            return null;
        }
        return (new QueryExecuteStampSheetLogRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withService(empty($data['service']) ? null : $data['service'])
            ->withMethod(empty($data['method']) ? null : $data['method'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withAction(empty($data['action']) ? null : $data['action'])
            ->withBegin(empty($data['begin']) && $data['begin'] !== 0 ? null : $data['begin'])
            ->withEnd(empty($data['end']) && $data['end'] !== 0 ? null : $data['end'])
            ->withLongTerm(empty($data['longTerm']) ? null : $data['longTerm'])
            ->withPageToken(empty($data['pageToken']) ? null : $data['pageToken'])
            ->withLimit(empty($data['limit']) && $data['limit'] !== 0 ? null : $data['limit']);
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
        );
    }
}