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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getPropertyFormModel: Get Property Form Model
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyformmodel
 */
class GetPropertyFormModelRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Property Form Model name */
    private $propertyFormModelName;
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
     * @return GetPropertyFormModelRequest
     */
	public function withNamespaceName(?string $namespaceName): GetPropertyFormModelRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Property Form Model name */
	public function getPropertyFormModelName(): ?string {
		return $this->propertyFormModelName;
	}
    /** @param string|null $propertyFormModelName Property Form Model name */
	public function setPropertyFormModelName(?string $propertyFormModelName) {
		$this->propertyFormModelName = $propertyFormModelName;
	}
    /**
     * @param string|null $propertyFormModelName Property Form Model name
     * @return GetPropertyFormModelRequest
     */
	public function withPropertyFormModelName(?string $propertyFormModelName): GetPropertyFormModelRequest {
		$this->propertyFormModelName = $propertyFormModelName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetPropertyFormModelRequest {
        if ($data === null) {
            return null;
        }
        return (new GetPropertyFormModelRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withPropertyFormModelName(array_key_exists('propertyFormModelName', $data) && $data['propertyFormModelName'] !== null ? $data['propertyFormModelName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "propertyFormModelName" => $this->getPropertyFormModelName(),
        );
    }
}