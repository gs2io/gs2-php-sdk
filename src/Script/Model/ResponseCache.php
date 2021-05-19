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

namespace Gs2\Script\Model;

use Gs2\Core\Model\IModel;

/**
 * レスポンスキャッシュ
 *
 * @author Game Server Services, Inc.
 *
 */
class ResponseCache implements IModel {
	/**
     * @var string None
	 */
	protected $region;

	/**
	 * Noneを取得
	 *
	 * @return string|null None
	 */
	public function getRegion(): ?string {
		return $this->region;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $region None
	 */
	public function setRegion(?string $region) {
		$this->region = $region;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $region None
	 * @return ResponseCache $this
	 */
	public function withRegion(?string $region): ResponseCache {
		$this->region = $region;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return ResponseCache $this
	 */
	public function withOwnerId(?string $ownerId): ResponseCache {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string レスポンスキャッシュ のGRN
	 */
	protected $responseCacheId;

	/**
	 * レスポンスキャッシュ のGRNを取得
	 *
	 * @return string|null レスポンスキャッシュ のGRN
	 */
	public function getResponseCacheId(): ?string {
		return $this->responseCacheId;
	}

	/**
	 * レスポンスキャッシュ のGRNを設定
	 *
	 * @param string|null $responseCacheId レスポンスキャッシュ のGRN
	 */
	public function setResponseCacheId(?string $responseCacheId) {
		$this->responseCacheId = $responseCacheId;
	}

	/**
	 * レスポンスキャッシュ のGRNを設定
	 *
	 * @param string|null $responseCacheId レスポンスキャッシュ のGRN
	 * @return ResponseCache $this
	 */
	public function withResponseCacheId(?string $responseCacheId): ResponseCache {
		$this->responseCacheId = $responseCacheId;
		return $this;
	}
	/**
     * @var string None
	 */
	protected $requestHash;

	/**
	 * Noneを取得
	 *
	 * @return string|null None
	 */
	public function getRequestHash(): ?string {
		return $this->requestHash;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $requestHash None
	 */
	public function setRequestHash(?string $requestHash) {
		$this->requestHash = $requestHash;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $requestHash None
	 * @return ResponseCache $this
	 */
	public function withRequestHash(?string $requestHash): ResponseCache {
		$this->requestHash = $requestHash;
		return $this;
	}
	/**
     * @var string APIの応答内容
	 */
	protected $result;

	/**
	 * APIの応答内容を取得
	 *
	 * @return string|null APIの応答内容
	 */
	public function getResult(): ?string {
		return $this->result;
	}

	/**
	 * APIの応答内容を設定
	 *
	 * @param string|null $result APIの応答内容
	 */
	public function setResult(?string $result) {
		$this->result = $result;
	}

	/**
	 * APIの応答内容を設定
	 *
	 * @param string|null $result APIの応答内容
	 * @return ResponseCache $this
	 */
	public function withResult(?string $result): ResponseCache {
		$this->result = $result;
		return $this;
	}

    public function toJson(): array {
        return array(
            "region" => $this->region,
            "ownerId" => $this->ownerId,
            "responseCacheId" => $this->responseCacheId,
            "requestHash" => $this->requestHash,
            "result" => $this->result,
        );
    }

    public static function fromJson(array $data): ResponseCache {
        $model = new ResponseCache();
        $model->setRegion(isset($data["region"]) ? $data["region"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setResponseCacheId(isset($data["responseCacheId"]) ? $data["responseCacheId"] : null);
        $model->setRequestHash(isset($data["requestHash"]) ? $data["requestHash"] : null);
        $model->setResult(isset($data["result"]) ? $data["result"] : null);
        return $model;
    }
}