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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getLike: Get Like
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#getlike
 */
class GetLikeRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Entry Model name */
    private $entryModelName;
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
     * @return GetLikeRequest
     */
	public function withNamespaceName(?string $namespaceName): GetLikeRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return GetLikeRequest
     */
	public function withAccessToken(?string $accessToken): GetLikeRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Entry Model name */
	public function getEntryModelName(): ?string {
		return $this->entryModelName;
	}
    /** @param string|null $entryModelName Entry Model name */
	public function setEntryModelName(?string $entryModelName) {
		$this->entryModelName = $entryModelName;
	}
    /**
     * @param string|null $entryModelName Entry Model name
     * @return GetLikeRequest
     */
	public function withEntryModelName(?string $entryModelName): GetLikeRequest {
		$this->entryModelName = $entryModelName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetLikeRequest {
        if ($data === null) {
            return null;
        }
        return (new GetLikeRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withEntryModelName(array_key_exists('entryModelName', $data) && $data['entryModelName'] !== null ? $data['entryModelName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "entryModelName" => $this->getEntryModelName(),
        );
    }
}