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

class PrepareUploadByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $name;
    /** @var string */
    private $contentType;
    /** @var string */
    private $scope;
    /** @var array */
    private $allowUserIds;
    /** @var bool */
    private $updateIfExists;
    /** @var string */
    private $duplicationAvoider;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): PrepareUploadByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): PrepareUploadByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): PrepareUploadByUserIdRequest {
		$this->name = $name;
		return $this;
	}

	public function getContentType(): ?string {
		return $this->contentType;
	}

	public function setContentType(?string $contentType) {
		$this->contentType = $contentType;
	}

	public function withContentType(?string $contentType): PrepareUploadByUserIdRequest {
		$this->contentType = $contentType;
		return $this;
	}

	public function getScope(): ?string {
		return $this->scope;
	}

	public function setScope(?string $scope) {
		$this->scope = $scope;
	}

	public function withScope(?string $scope): PrepareUploadByUserIdRequest {
		$this->scope = $scope;
		return $this;
	}

	public function getAllowUserIds(): ?array {
		return $this->allowUserIds;
	}

	public function setAllowUserIds(?array $allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}

	public function withAllowUserIds(?array $allowUserIds): PrepareUploadByUserIdRequest {
		$this->allowUserIds = $allowUserIds;
		return $this;
	}

	public function getUpdateIfExists(): ?bool {
		return $this->updateIfExists;
	}

	public function setUpdateIfExists(?bool $updateIfExists) {
		$this->updateIfExists = $updateIfExists;
	}

	public function withUpdateIfExists(?bool $updateIfExists): PrepareUploadByUserIdRequest {
		$this->updateIfExists = $updateIfExists;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PrepareUploadByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareUploadByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new PrepareUploadByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withContentType(array_key_exists('contentType', $data) && $data['contentType'] !== null ? $data['contentType'] : null)
            ->withScope(array_key_exists('scope', $data) && $data['scope'] !== null ? $data['scope'] : null)
            ->withAllowUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('allowUserIds', $data) && $data['allowUserIds'] !== null ? $data['allowUserIds'] : []
            ))
            ->withUpdateIfExists($data['updateIfExists']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "name" => $this->getName(),
            "contentType" => $this->getContentType(),
            "scope" => $this->getScope(),
            "allowUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getAllowUserIds() !== null && $this->getAllowUserIds() !== null ? $this->getAllowUserIds() : []
            ),
            "updateIfExists" => $this->getUpdateIfExists(),
        );
    }
}