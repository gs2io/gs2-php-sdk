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

namespace Gs2\Exchange\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getAwait: Get Exchange Await
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#getawait
 */
class GetAwaitRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Exchange Await name */
    private $awaitName;
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
     * @return GetAwaitRequest
     */
	public function withNamespaceName(?string $namespaceName): GetAwaitRequest {
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
     * @return GetAwaitRequest
     */
	public function withAccessToken(?string $accessToken): GetAwaitRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Exchange Await name */
	public function getAwaitName(): ?string {
		return $this->awaitName;
	}
    /** @param string|null $awaitName Exchange Await name */
	public function setAwaitName(?string $awaitName) {
		$this->awaitName = $awaitName;
	}
    /**
     * @param string|null $awaitName Exchange Await name
     * @return GetAwaitRequest
     */
	public function withAwaitName(?string $awaitName): GetAwaitRequest {
		$this->awaitName = $awaitName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetAwaitRequest {
        if ($data === null) {
            return null;
        }
        return (new GetAwaitRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withAwaitName(array_key_exists('awaitName', $data) && $data['awaitName'] !== null ? $data['awaitName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "awaitName" => $this->getAwaitName(),
        );
    }
}