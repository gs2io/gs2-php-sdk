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
 * Request for exportMaster: Export Parameter Model Master in a master data format that can be activated
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#exportmaster
 */
class ExportMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
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
     * @return ExportMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): ExportMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

    public static function fromJson(?array $data): ?ExportMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new ExportMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
        );
    }
}