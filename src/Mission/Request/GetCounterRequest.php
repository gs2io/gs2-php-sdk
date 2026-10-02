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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getCounter: Get Counter
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#getcounter
 */
class GetCounterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Counter Model name */
    private $counterName;
    /** @var string User ID */
    private $accessToken;
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
     * @return GetCounterRequest
     */
	public function withNamespaceName(?string $namespaceName): GetCounterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Counter Model name */
	public function getCounterName(): ?string {
		return $this->counterName;
	}
    /** @param string|null $counterName Counter Model name */
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}
    /**
     * @param string|null $counterName Counter Model name
     * @return GetCounterRequest
     */
	public function withCounterName(?string $counterName): GetCounterRequest {
		$this->counterName = $counterName;
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
     * @return GetCounterRequest
     */
	public function withAccessToken(?string $accessToken): GetCounterRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetCounterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetCounterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "counterName" => $this->getCounterName(),
            "accessToken" => $this->getAccessToken(),
        );
    }
}