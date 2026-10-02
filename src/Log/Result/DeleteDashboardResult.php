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

namespace Gs2\Log\Result;

use Gs2\Core\Model\IResult;
use Gs2\Log\Model\Dashboard;

/**
 * Result of deleteDashboard: Delete Dashboard
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#deletedashboard
 */
class DeleteDashboardResult implements IResult {
    /** @var Dashboard Deleted Dashboard */
    private $item;

    /** @return Dashboard|null Deleted Dashboard */
	public function getItem(): ?Dashboard {
		return $this->item;
	}

    /** @param Dashboard|null $item Deleted Dashboard */
	public function setItem(?Dashboard $item) {
		$this->item = $item;
	}

    /**
     * @param Dashboard|null $item Deleted Dashboard
     * @return DeleteDashboardResult
     */
	public function withItem(?Dashboard $item): DeleteDashboardResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteDashboardResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteDashboardResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Dashboard::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}