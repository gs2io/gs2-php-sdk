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

class RestoreDataObjectRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $dataObjectId;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): RestoreDataObjectRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getDataObjectId(): ?string {
		return $this->dataObjectId;
	}

	public function setDataObjectId(?string $dataObjectId) {
		$this->dataObjectId = $dataObjectId;
	}

	public function withDataObjectId(?string $dataObjectId): RestoreDataObjectRequest {
		$this->dataObjectId = $dataObjectId;
		return $this;
	}

    public static function fromJson(?array $data): ?RestoreDataObjectRequest {
        if ($data === null) {
            return null;
        }
        return (new RestoreDataObjectRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withDataObjectId(empty($data['dataObjectId']) ? null : $data['dataObjectId']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "dataObjectId" => $this->getDataObjectId(),
        );
    }
}