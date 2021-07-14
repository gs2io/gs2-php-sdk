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

namespace Gs2\News\Model;

use Gs2\Core\Model\IModel;


class ResponseCache implements IModel {
	/**
     * @var string
	 */
	private $region;
	/**
     * @var string
	 */
	private $responseCacheId;
	/**
     * @var string
	 */
	private $requestHash;
	/**
     * @var string
	 */
	private $result;

	public function getRegion(): ?string {
		return $this->region;
	}

	public function setRegion(?string $region) {
		$this->region = $region;
	}

	public function withRegion(?string $region): ResponseCache {
		$this->region = $region;
		return $this;
	}

	public function getResponseCacheId(): ?string {
		return $this->responseCacheId;
	}

	public function setResponseCacheId(?string $responseCacheId) {
		$this->responseCacheId = $responseCacheId;
	}

	public function withResponseCacheId(?string $responseCacheId): ResponseCache {
		$this->responseCacheId = $responseCacheId;
		return $this;
	}

	public function getRequestHash(): ?string {
		return $this->requestHash;
	}

	public function setRequestHash(?string $requestHash) {
		$this->requestHash = $requestHash;
	}

	public function withRequestHash(?string $requestHash): ResponseCache {
		$this->requestHash = $requestHash;
		return $this;
	}

	public function getResult(): ?string {
		return $this->result;
	}

	public function setResult(?string $result) {
		$this->result = $result;
	}

	public function withResult(?string $result): ResponseCache {
		$this->result = $result;
		return $this;
	}

    public static function fromJson(?array $data): ?ResponseCache {
        if ($data === null) {
            return null;
        }
        return (new ResponseCache())
            ->withRegion(empty($data['region']) ? null : $data['region'])
            ->withResponseCacheId(empty($data['responseCacheId']) ? null : $data['responseCacheId'])
            ->withRequestHash(empty($data['requestHash']) ? null : $data['requestHash'])
            ->withResult(empty($data['result']) ? null : $data['result']);
    }

    public function toJson(): array {
        return array(
            "region" => $this->getRegion(),
            "responseCacheId" => $this->getResponseCacheId(),
            "requestHash" => $this->getRequestHash(),
            "result" => $this->getResult(),
        );
    }
}