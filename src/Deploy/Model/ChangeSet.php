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

namespace Gs2\Deploy\Model;

use Gs2\Core\Model\IModel;


class ChangeSet implements IModel {
	/**
     * @var string
	 */
	private $resourceName;
	/**
     * @var string
	 */
	private $resourceType;
	/**
     * @var string
	 */
	private $operation;
	public function getResourceName(): ?string {
		return $this->resourceName;
	}
	public function setResourceName(?string $resourceName) {
		$this->resourceName = $resourceName;
	}
	public function withResourceName(?string $resourceName): ChangeSet {
		$this->resourceName = $resourceName;
		return $this;
	}
	public function getResourceType(): ?string {
		return $this->resourceType;
	}
	public function setResourceType(?string $resourceType) {
		$this->resourceType = $resourceType;
	}
	public function withResourceType(?string $resourceType): ChangeSet {
		$this->resourceType = $resourceType;
		return $this;
	}
	public function getOperation(): ?string {
		return $this->operation;
	}
	public function setOperation(?string $operation) {
		$this->operation = $operation;
	}
	public function withOperation(?string $operation): ChangeSet {
		$this->operation = $operation;
		return $this;
	}

    public static function fromJson(?array $data): ?ChangeSet {
        if ($data === null) {
            return null;
        }
        return (new ChangeSet())
            ->withResourceName(array_key_exists('resourceName', $data) && $data['resourceName'] !== null ? $data['resourceName'] : null)
            ->withResourceType(array_key_exists('resourceType', $data) && $data['resourceType'] !== null ? $data['resourceType'] : null)
            ->withOperation(array_key_exists('operation', $data) && $data['operation'] !== null ? $data['operation'] : null);
    }

    public function toJson(): array {
        return array(
            "resourceName" => $this->getResourceName(),
            "resourceType" => $this->getResourceType(),
            "operation" => $this->getOperation(),
        );
    }
}