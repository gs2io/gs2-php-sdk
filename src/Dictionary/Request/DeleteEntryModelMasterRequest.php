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
 * Request for deleteEntryModelMaster: Delete Entry Model Master
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#deleteentrymodelmaster
 */
class DeleteEntryModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Entry Model name */
    private $entryName;
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
     * @return DeleteEntryModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteEntryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Entry Model name */
	public function getEntryName(): ?string {
		return $this->entryName;
	}
    /** @param string|null $entryName Entry Model name */
	public function setEntryName(?string $entryName) {
		$this->entryName = $entryName;
	}
    /**
     * @param string|null $entryName Entry Model name
     * @return DeleteEntryModelMasterRequest
     */
	public function withEntryName(?string $entryName): DeleteEntryModelMasterRequest {
		$this->entryName = $entryName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteEntryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteEntryModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withEntryName(array_key_exists('entryName', $data) && $data['entryName'] !== null ? $data['entryName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "entryName" => $this->getEntryName(),
        );
    }
}