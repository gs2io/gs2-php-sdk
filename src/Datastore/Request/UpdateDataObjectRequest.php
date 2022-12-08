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

namespace Gs2\Datastore\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class UpdateDataObjectRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $dataObjectName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $scope;
    /** @var array */
    private $allowUserIds;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateDataObjectRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getDataObjectName(): ?string {
		return $this->dataObjectName;
	}
	public function setDataObjectName(?string $dataObjectName) {
		$this->dataObjectName = $dataObjectName;
	}
	public function withDataObjectName(?string $dataObjectName): UpdateDataObjectRequest {
		$this->dataObjectName = $dataObjectName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): UpdateDataObjectRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getScope(): ?string {
		return $this->scope;
	}
	public function setScope(?string $scope) {
		$this->scope = $scope;
	}
	public function withScope(?string $scope): UpdateDataObjectRequest {
		$this->scope = $scope;
		return $this;
	}
	public function getAllowUserIds(): ?array {
		return $this->allowUserIds;
	}
	public function setAllowUserIds(?array $allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}
	public function withAllowUserIds(?array $allowUserIds): UpdateDataObjectRequest {
		$this->allowUserIds = $allowUserIds;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateDataObjectRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateDataObjectRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateDataObjectRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDataObjectName(array_key_exists('dataObjectName', $data) && $data['dataObjectName'] !== null ? $data['dataObjectName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withScope(array_key_exists('scope', $data) && $data['scope'] !== null ? $data['scope'] : null)
            ->withAllowUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('allowUserIds', $data) && $data['allowUserIds'] !== null ? $data['allowUserIds'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "dataObjectName" => $this->getDataObjectName(),
            "accessToken" => $this->getAccessToken(),
            "scope" => $this->getScope(),
            "allowUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getAllowUserIds() !== null && $this->getAllowUserIds() !== null ? $this->getAllowUserIds() : []
            ),
        );
    }
}