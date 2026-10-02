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

/**
 * Request for restoreDataObject: Repair management information on data objects
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#restoredataobject
 */
class RestoreDataObjectRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Data object GRN */
    private $dataObjectId;
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
     * @return RestoreDataObjectRequest
     */
	public function withNamespaceName(?string $namespaceName): RestoreDataObjectRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Data object GRN */
	public function getDataObjectId(): ?string {
		return $this->dataObjectId;
	}
    /** @param string|null $dataObjectId Data object GRN */
	public function setDataObjectId(?string $dataObjectId) {
		$this->dataObjectId = $dataObjectId;
	}
    /**
     * @param string|null $dataObjectId Data object GRN
     * @return RestoreDataObjectRequest
     */
	public function withDataObjectId(?string $dataObjectId): RestoreDataObjectRequest {
		$this->dataObjectId = $dataObjectId;
		return $this;
	}

    public static function fromJson(?array $data): ?RestoreDataObjectRequest {
        if ($data === null) {
            return null;
        }
        return (new RestoreDataObjectRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDataObjectId(array_key_exists('dataObjectId', $data) && $data['dataObjectId'] !== null ? $data['dataObjectId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "dataObjectId" => $this->getDataObjectId(),
        );
    }
}