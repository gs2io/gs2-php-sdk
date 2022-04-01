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

class CountAccessLogRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var bool */
    private $service;
    /** @var bool */
    private $method;
    /** @var bool */
    private $userId;
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

	public function withNamespaceName(?string $namespaceName): CountAccessLogRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getService(): ?bool {
		return $this->service;
	}

	public function setService(?bool $service) {
		$this->service = $service;
	}

	public function withService(?bool $service): CountAccessLogRequest {
		$this->service = $service;
		return $this;
	}

	public function getMethod(): ?bool {
		return $this->method;
	}

	public function setMethod(?bool $method) {
		$this->method = $method;
	}

	public function withMethod(?bool $method): CountAccessLogRequest {
		$this->method = $method;
		return $this;
	}

	public function getUserId(): ?bool {
		return $this->userId;
	}

	public function setUserId(?bool $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?bool $userId): CountAccessLogRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getBegin(): ?int {
		return $this->begin;
	}

	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}

	public function withBegin(?int $begin): CountAccessLogRequest {
		$this->begin = $begin;
		return $this;
	}

	public function getEnd(): ?int {
		return $this->end;
	}

	public function setEnd(?int $end) {
		$this->end = $end;
	}

	public function withEnd(?int $end): CountAccessLogRequest {
		$this->end = $end;
		return $this;
	}

	public function getLongTerm(): ?bool {
		return $this->longTerm;
	}

	public function setLongTerm(?bool $longTerm) {
		$this->longTerm = $longTerm;
	}

	public function withLongTerm(?bool $longTerm): CountAccessLogRequest {
		$this->longTerm = $longTerm;
		return $this;
	}

	public function getPageToken(): ?string {
		return $this->pageToken;
	}

	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}

	public function withPageToken(?string $pageToken): CountAccessLogRequest {
		$this->pageToken = $pageToken;
		return $this;
	}

	public function getLimit(): ?int {
		return $this->limit;
	}

	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}

	public function withLimit(?int $limit): CountAccessLogRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?CountAccessLogRequest {
        if ($data === null) {
            return null;
        }
        return (new CountAccessLogRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withService($data['service'])
            ->withMethod($data['method'])
            ->withUserId($data['userId'])
            ->withBegin(array_key_exists('begin', $data) && $data['begin'] !== null ? $data['begin'] : null)
            ->withEnd(array_key_exists('end', $data) && $data['end'] !== null ? $data['end'] : null)
            ->withLongTerm($data['longTerm'])
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "service" => $this->getService(),
            "method" => $this->getMethod(),
            "userId" => $this->getUserId(),
            "begin" => $this->getBegin(),
            "end" => $this->getEnd(),
            "longTerm" => $this->getLongTerm(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}