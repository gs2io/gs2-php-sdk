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

namespace Gs2\Enchant\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getBalanceParameterStatus: Get Balance Parameter Status
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#getbalanceparameterstatus
 */
class GetBalanceParameterStatusRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Balance Parameter Model name */
    private $parameterName;
    /** @var string Property ID of the resource that owns the parameter */
    private $propertyId;
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
     * @return GetBalanceParameterStatusRequest
     */
	public function withNamespaceName(?string $namespaceName): GetBalanceParameterStatusRequest {
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
     * @return GetBalanceParameterStatusRequest
     */
	public function withAccessToken(?string $accessToken): GetBalanceParameterStatusRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Balance Parameter Model name */
	public function getParameterName(): ?string {
		return $this->parameterName;
	}
    /** @param string|null $parameterName Balance Parameter Model name */
	public function setParameterName(?string $parameterName) {
		$this->parameterName = $parameterName;
	}
    /**
     * @param string|null $parameterName Balance Parameter Model name
     * @return GetBalanceParameterStatusRequest
     */
	public function withParameterName(?string $parameterName): GetBalanceParameterStatusRequest {
		$this->parameterName = $parameterName;
		return $this;
	}
    /** @return string|null Property ID of the resource that owns the parameter */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID of the resource that owns the parameter */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID of the resource that owns the parameter
     * @return GetBalanceParameterStatusRequest
     */
	public function withPropertyId(?string $propertyId): GetBalanceParameterStatusRequest {
		$this->propertyId = $propertyId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetBalanceParameterStatusRequest {
        if ($data === null) {
            return null;
        }
        return (new GetBalanceParameterStatusRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withParameterName(array_key_exists('parameterName', $data) && $data['parameterName'] !== null ? $data['parameterName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "parameterName" => $this->getParameterName(),
            "propertyId" => $this->getPropertyId(),
        );
    }
}